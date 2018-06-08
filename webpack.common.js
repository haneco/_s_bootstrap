const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = (minimize) => {
  return {
    entry: './src/js/index.js',
    output: {
      path: `${__dirname}/inc/assets/js`,
      filename: 'main.js'
    },
    optimization: {
      minimize: minimize,
    },
    module: {
      rules: [
        {
          test: require.resolve('jquery'),
          use: [{
            loader: 'expose-loader',
            options: 'jQuery'
          }]
        },
        {
          test: /\.scss/,
          use: ExtractTextPlugin.extract({
            use: [
              {
                loader: 'css-loader',
                options: {
                  url: false,
                  sourceMap: true,
                  minimize: minimize,
                  importLoaders: 2
                },
              },
              {
                loader: 'postcss-loader',
                options: {
                  sourceMap: true,
                  plugins: [
                    require('autoprefixer')({
                      grid: true
                    })
                  ]
                },
              },
              {
                loader: 'sass-loader',
                options: {
                  sourceMap: true,
                }
              }
            ],
          })
        }
      ],
    },
    plugins: [
      new ExtractTextPlugin('../../../style.css')
    ]
  }
};
