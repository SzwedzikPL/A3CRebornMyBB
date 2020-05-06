
const config = {
  mode: 'development',
  devtool: '#cheap-module-eval-source-map',
  output: {
    filename: '[name].js',
    chunkFilename: '[name].js',
  },
};

module.exports = config;
