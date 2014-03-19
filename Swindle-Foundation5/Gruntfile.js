module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
	  compass: {                  // Task
	    dist: {                   // Target
	      options: {              // Target options
	        cssDir: 'stylesheets',
	        require: 'zurb-foundation',
	        sassDir: 'bower_components/foundation/scss',
	        cacheDir: '.sass_cache',
	      }
	    }
	  },

	  watch: {
	  	css: {
	  		files: ['scss/_settings.scss'],
	  		tasks: ['compass:dist'],
	  		option: { 
	  			spawn: false, 
	  			livereload: true
	  		}
	  	}
	  },

	  	//CREAT DISTRIBUTION VERSION

		copy: {
	      dist: {
	        files: [
				{expand: true, src: ['google-api-php-client/**'], dest: '../dist/'},
				{expand: true, src: ['images/**'], dest: '../dist/'},
				{expand: true, src: ['js/**'], dest: '../dist/'},
				{expand: true, src: ['*.php'], dest: '../dist/'},
				{expand: true, src: ['inc.config.php-template'], dest: '../dist/'},
	        ]
	      }
	    },

	    cssmin: {
		  minify: {
		    expand: true,
		    cwd: 'stylesheets/',
		    src: ['*.css', '!*.min.css'],
		    dest: '../dist/stylesheets/',
		    ext: '.min.css'
		  }
		},


		//concatener tout puis reduce avec uglify ?
		concat: {
	      dist: {
	        files: {
	          	'../dist/js/foundation/foundation.js': 'bower_components/foundation/foundation.js'
	        }
	      }
		},

		uglify: {
	      options: {
	        preserveComments: 'some'
	      },
	      dist: {
	        files: {
	          '../dist/js/app.min.js': ['js/app.js'],
	          '../dist/js/modernizr.js': ['bower_components/modernizr/modernizr.js']
	        }
	      },
	      vendor: {
	        files: {
	          '../dist/js/vendor/placeholder.js': 'bower_components/jquery-placeholder/jquery.placeholder.js',
	          '../dist/js/vendor/fastclick.js': 'bower_components/fastclick/lib/fastclick.js',
	          '../dist/js/vendor/jquery.cookie.js': 'bower_components/jquery.cookie/jquery.cookie.js',
	          '../dist/js/vendor/jquery.js': 'bower_components/jquery/dist/jquery.js',
	          '../dist/js/vendor/modernizr.js': 'bower_components/modernizr/modernizr.js'
	        }
	      }
		},

		imagemin: {                          // Task
		    dist: {                         // Another target
		      files: [{
		        expand: true,                  // Enable dynamic expansion
		        cwd: 'images/',                   // Src matches are relative to this path
		        src: ['*.{png,gif}'],   // Actual patterns to match
		        dest: '../dist/images/'                  // Destination path prefix
		      }]
		    }
		  },

		  replace: {
			  dist: {
			    src: ['../dist/*.php'],
			    overwrite: true,                 // overwrite matched source files
			    replacements: [{
			      from: "bower_components/modernizr/",
			      to: "js/"
			    }]
			  },
			 distCSS: {
			    src: ['../dist/*.php'],
			    overwrite: true,                 // overwrite matched source files
			    replacements: [{
			      from: "foundation.css",
			      to: "foundation.min.css"
			    }]
			  },
			 distJS: {
			    src: ['../dist/*.php'],
			    overwrite: true,                 // overwrite matched source files
			    replacements: [{
			      from: "bower_components/jquery/", 
			      to: "js/vendor/"
			    }]
			  },
			 distT: {
			    src: ['../dist/*.php'],
			    overwrite: true,                 // overwrite matched source files
			    replacements: [{
			      from: "bower_components/foundation/js/foundation.min.js",
			      to: "js/foundation/foundation.js"
			    }]
			  },
			},

	    //CLEAN REPO DIST

		clean: {
		  dist: {
		  	src: ["../dist/"],
		    options: {
		      force: true
			}
		  }
		},

	});

	grunt.registerTask('distribution', ['copy', 'cssmin', 'concat', 'uglify', 'replace', 'imagemin'])

}