const MINIMIZE = true;

const merge = require('webpack-merge');
const common = require('./webpack.common.js')(MINIMIZE);

module.exports = merge(common, {
	mode: 'production'
});
