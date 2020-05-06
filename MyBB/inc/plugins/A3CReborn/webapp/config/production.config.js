const path = require('path');
const webpack = require('webpack');

const config = {
  mode: 'production',
  devtool: false,
  output: {
    filename: '[id].[contenthash].js',
    chunkFilename: '[id].[contenthash].js',
  },
};

module.exports = config;
