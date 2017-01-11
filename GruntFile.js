module.exports = function(grunt) {
    grunt.initConfig({
        postcss: {
            options: {
                processors: [
                    require('pixrem')(),
                    require('autoprefixer')({browsers: ['> 0%']}),
                    require('postcss-flexboxfixer'),
                    require('cssnano')()
                ]
            },
            bwg: {
                files: [{
                    expand:true,
                    flatten:true,
                    cwd: 'assets/',
                    src: ['scss/*.css', '!**/variables.css'],
                    dest:'assets/css/'
                }]
            }
        },
        watch: {
            styles: {
                files: [
                    'assets/scss/*.css'
                ],
                tasks:['postcss:bwg']
            }
        }
    });
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', ["watch:styles"]);
    grunt.registerTask('bwg', ["postcss:bwg"]);
};