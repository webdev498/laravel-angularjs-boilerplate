'use strict';

var fs = require('fs');

module.exports = function(grunt){
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	var config = {

		mkdir: {
			all: {
				options: {
					create: ['public/css', 'public/js']
				}
			}
		},

		concurrent: {
			install: {
				tasks: ['mkdir', 'less', 'browserify', 'bower_concat', 'uglify' ],
				options:{
					limit: 5
				}
			},
			dev: {
				tasks: ['watch'],
				options: {
					logConcurrentOutput: true
				}
			}
		},

		browserify: {
			dist: {
				files: {
					'public/js/base.js': ['src/js/base.js']
				}
			}
		},

		uglify: {
			targets: {
				files: {
					'public/js/base.min.js': ['public/js/base.js'],
					'public/js/lib.min.js': ['public/js/lib.js']
				}
			}
		},

		bower_concat: {
			all: {
				dest: 'public/js/lib.js'
			},
		},

		less: {
			development: {
				files: {
					"public/css/base.css": "src/less/base.less"
				}
			},
			production: {
				options: {
					compress: true,
					yuicompress: true,
					optimization: 2
				},
				files: {
					"public/css/base.min.css": "src/less/base.less"
				}
			}
		},

		nodemon: {
			dev: {}
		},

		watch: {
			options: {
				nospawn: true,
				livereload: true
			},
			js: {
				files: ['src/js/*.js', 'src/js/**/*.js'],
				tasks: ['browserify', 'uglify']
			},
			css: {
				files: ['src/less/*.less', 'src/less/**/*.less'],
				tasks: ['less']
			},
			views: {
				files: ['app/views/**/*.php']
			}
		}
	};

	grunt.initConfig(config);

	grunt.registerTask('default', [
		'concurrent:dev'
	]);
	grunt.registerTask('install', [
		'concurrent:install'
	]);

};
