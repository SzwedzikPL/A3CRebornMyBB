const path = require('path');
const webpack = require('webpack');
const {VueLoaderPlugin} = require('vue-loader');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const DirectoryNamedWebpackPlugin = require("directory-named-webpack-plugin");
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const config = {
  entry: {
    gamercp: path.join(__dirname, '../src/apps/gamercp/gamercp.js'),
    cadrecp: path.join(__dirname, '../src/apps/cadrecp/cadrecp.js'),
    memberlist: path.join(__dirname, '../src/apps/memberlist/memberlist.js'),
    memberProfile: path.join(__dirname, '../src/apps/memberProfile/memberProfile.js'),
    recruitmentForm: path.join(__dirname, '../src/apps/recruitmentForm/recruitmentForm.js'),
    stats: path.join(__dirname, '../src/apps/stats/stats.js'),
    shoutbox: path.join(__dirname, '../src/apps/shoutbox/shoutbox.js'),
    theme: path.join(__dirname, '../src/apps/theme/theme.js'),
  },
  output: {
    path: path.join(__dirname, '../dist'),
    publicPath: '/mybb/assets/a3creborn/'
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        use: {
          loader: 'vue-loader'
        }
      },
      {
        test: /\.css$/i,
        use: [MiniCssExtractPlugin.loader, 'css-loader'],
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ],
      },
      {
        test: /\.node$/,
        use: 'node-loader'
      },
      {
        test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
        use: {
          loader: 'url-loader',
          query: {
            limit: false,
            name: 'images/[name].[contenthash].[ext]'
          }
        }
      },
      {
        test: /\.(mp4|webm|ogg|mp3|wav|flac|aac)(\?.*)?$/,
        loader: 'url-loader',
        options: {
          limit: false,
          name: 'media/[name].[contenthash].[ext]'
        }
      },
      {
        test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
        use: {
          loader: 'url-loader',
          query: {
            limit: false,
            name: 'fonts/[name].[contenthash].[ext]'
          }
        }
      }
    ]
  },
  plugins: [
    new VueLoaderPlugin(),
    new MiniCssExtractPlugin({
      filename: '[name].css',
      chunkFilename: '[id].css',
      ignoreOrder: false,
    }),
    new HtmlWebpackPlugin({
      filename: 'gamercp_page.html',
      chunks: ['gamercp'],
      template: path.resolve(__dirname, '../src/apps/gamercp/gamercp.html'),
    }),
    new HtmlWebpackPlugin({
      filename: 'cadrecp_page.html',
      chunks: ['cadrecp'],
      template: path.resolve(__dirname, '../src/apps/cadrecp/cadrecp.html'),
    }),
    new HtmlWebpackPlugin({
      filename: 'memberlist_page.html',
      chunks: ['memberlist'],
      template: path.resolve(__dirname, '../src/apps/memberlist/memberlist.html'),
    }),
    new HtmlWebpackPlugin({
      filename: 'member_profile_page.html',
      chunks: ['memberProfile'],
      template: path.resolve(__dirname, '../src/apps/memberProfile/memberProfile.html'),
    }),
    new HtmlWebpackPlugin({
      filename: 'recruitment_form_page.html',
      chunks: ['recruitmentForm'],
      template: path.resolve(__dirname, '../src/apps/recruitmentForm/recruitmentForm.html'),
    }),
    new HtmlWebpackPlugin({
      filename: 'stats_page.html',
      chunks: ['stats'],
      template: path.resolve(__dirname, '../src/apps/stats/stats.html'),
    }),
    new HtmlWebpackPlugin({
      filename: 'index_shoutbox.html',
      chunks: ['shoutbox'],
      template: path.resolve(__dirname, '../src/apps/shoutbox/shoutbox.html'),
    }),
    new HtmlWebpackPlugin({
      filename: 'index_shoutbox.html',
      chunks: ['shoutbox'],
      template: path.resolve(__dirname, '../src/apps/shoutbox/shoutbox.html'),
    }),
    new HtmlWebpackPlugin({
      filename: 'header_include.html',
      chunks: ['theme'],
      inject: false,
      template: path.resolve(__dirname, '../src/apps/theme/include.ejs'),
    }),
    new webpack.DefinePlugin({
      'process.env.NODE_ENV': `"${process.env.NODE_ENV || 'development'}"`
    }),
  ],
  resolve: {
    plugins: [
      new DirectoryNamedWebpackPlugin({
        honorIndex: true,
        include: [
          path.resolve(__dirname, '../src'),
        ]
      })
    ],
    alias: {
      '@': path.resolve(__dirname, '../src'),
      '@theme': path.resolve(__dirname, '../src/apps/theme'),
    },
    extensions: ['.js', '.vue', '.json', '.css']
  },
  optimization: {
    splitChunks: {
      chunks: 'all'
    }
  },
  target: 'web'
};

module.exports = config;
