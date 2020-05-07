const ENV = process.argv.includes('--production') ? 'production' : 'development';
const WATCH = process.argv.includes('--watch');

process.env.NODE_ENV = ENV;

const chalk = require('chalk');
const del = require('del');
const path = require('path');
const fs = require('fs');
const webpack = require('webpack');
const merge = require('webpack-merge');

const distPath = path.resolve(__dirname, '..', 'dist');
const distStaticPath = path.resolve(distPath, 'static');

function move_templates() {
  console.log('Moving templates to plugin...\n');

  const templatesPath = path.resolve(__dirname, '..', '..', 'plugin', 'templates');

  fs.readdirSync(distPath).forEach(file => {
    if (!file.endsWith('.html')) return;

    console.log(`> ${file}`);

    const newPath = path.resolve(templatesPath, file);

    // Delete current template if present
    del.sync([newPath], {force: true});

    // Move new template
    fs.renameSync(path.resolve(distPath, file), newPath);
  });

  console.log('\nAll templates moved\n');
}

function copyFileSync(source, target) {
  let targetFile = target;

  if (fs.existsSync(target) && fs.lstatSync(target).isDirectory())
    targetFile = path.join(target, path.basename(source));

  console.log(`> ${path.relative(distStaticPath, targetFile)}`);

  fs.writeFileSync(targetFile, fs.readFileSync(source));
}

function copyFolderRecursiveSync(source, target) {
  const targetFolder = path.join(target, path.basename(source));
  if (!fs.existsSync(targetFolder)) fs.mkdirSync(targetFolder);

  if (fs.lstatSync(source).isDirectory()) {
    const files = fs.readdirSync(source);
    files.forEach(file => {
      const fileSource = path.join(source, file);
      if (fs.lstatSync(fileSource).isDirectory())
        copyFolderRecursiveSync(fileSource, targetFolder);
      else
        copyFileSync(fileSource, targetFolder);
    });
  }
}

function copy_static_files() {
  console.log('Copying static files...\n');

  // Copy all static files
  copyFolderRecursiveSync(path.resolve(__dirname, '..', 'src', 'static'), distPath);

  console.log('\nStatic files copied\n');
}

function logError(data) {
  console.log(chalk.red.bold(data));
}

function logStats(data) {
  let log = '';

  if (typeof data === 'object') {
    log += data.toString({
      colors: true,
      chunks: false
    });
  } else {
    log += data;
  }

  console.log(log + '\n');
}

console.log(`Loading ${ENV} config...\n`);

const commonConfig = require('../config/common.config');
const envConfig = require(`../config/${ENV}.config`);

let localConfig = {};
const  localConfigPath = path.resolve(__dirname, '..', 'config', 'local.config.js');

if (fs.existsSync(localConfigPath)) {
  console.log('Local config detected. Merging...\n');
  localConfig = require(localConfigPath);
}

const config = merge(commonConfig, envConfig, localConfig);

console.log('Config loaded\n');

// Clear output dir
del.sync([
  path.join(config.output.path, '*'),
]);


console.log(`Building ${ENV} bundle...\n`);

if (!WATCH) {
  webpack(config, (error, stats) => {
    if (error) {
      logError(error);
      process.exit();
    }
    logStats(stats);
    move_templates();
    copy_static_files();
    console.log(`Building ${ENV} bundle done\n`);
    process.exit();
  });
  return;
}

let firstBuild = true;
const compiler = webpack(config);

compiler.hooks.watchRun.tapAsync('watch-run', (compilation, done) => {
  if (!firstBuild) console.log(`Change detected. Building new ${ENV} bundle...`);
  done();
});

compiler.watch({}, (error, stats) => {
  firstBuild = false;
  if (error) return logError(error);

  logStats(stats);
  move_templates();
  copy_static_files();

  console.log(`Building ${ENV} bundle done. Watching for changes...\n`);
});
