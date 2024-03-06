const path = require( 'path' );
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const {CleanWebpackPlugin} = require( 'clean-webpack-plugin' );
const OptimizeCssAssetsPlugin = require( 'css-minimizer-webpack-plugin' );
const cssnano = require( 'cssnano' );
const TerserJSPlugin = require( 'terser-webpack-plugin' );



const JS_DIR = path.resolve(__dirname , 'src/js');
const IMG_DIR = path.resolve(__dirname , 'src/img');
const BUILD_DIR = path.resolve(__dirname , 'build');

const entry = {
    main: JS_DIR + '/main.js',
    single: JS_DIR + '/single.js',
};
const output = {
    path: BUILD_DIR,
    filename : 'js/[name].js'
};

const rules = [
    {
        // Rules for javascript file
        test: /\.js$/,
        include: [ JS_DIR ],
        exclude: /node_modules/,
        use: 'babel-loader'
    },

    {
        // Rules for css file
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader , 'css-loader'],
    },

    {
        // Rules for images and files
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use:[
                {
                    loader: 'file-loader',
                    options: {
                        name: '[path][name].[ext]',
                        publicPath: 'production' === process.env.NODE_ENV ? '../' : '../..',
                    },
                },
            ],
    }
];

const plugins = ( argv ) => {
    //plugin for cleaning unused assets and output files on rebuild
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: ( 'production' === argv.mode)
    }),

    //plugin for extracting css after bundling of files
    new MiniCssExtractPlugin({
        filename: 'css/[name].css'
    })
};

module.exports = (env , argv) => ({
    entry : entry,
    output : output,
    devtool : 'source-map',
    module : {
        rules : rules,
    },
    optimization: {
        minimizer: [
            new OptimizeCssAssetsPlugin({
                minimizerOptions:{
                    minimizerImplementation: cssnano,
                }
            }),
            new TerserJSPlugin({
                // Cache: false,
                parallel: true,
                terserOptions: {
                    // Specify your Terser options here
                    sourceMap: false, // Example: sourceMap option
                },
            }),
        ]
    },
    plugins: plugins( argv ),
    externals: {
        jquery: 'jQuery'
    }
});