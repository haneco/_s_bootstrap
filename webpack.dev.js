const MINIMIZE = false;

const merge = require('webpack-merge');
const common = require('./webpack.common.js')(MINIMIZE);

module.exports = merge(common, {
  mode: 'development',
  devtool: 'source-map'
});
