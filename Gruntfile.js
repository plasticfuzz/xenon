/*global module:false*/
module.exports = function(grunt) {

  /**
   * LOAD PLUGINS
   *
   * load-grunt-tasks which reads package.json and auto loads everything for us
   */
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({

    /**
     * Set up pkg to it can be read and used by the pending configurations
     */
    pkg: grunt.file.readJSON('package.json'),

    /**
     * Compass: to compile and minify CSS
     */
    compass: {
      compile: {
        options: {
          config: 'config.rb'
        }
      },
    },

    /**
     * JSHint: lints the JS in the specified directories and outputs in terminal
     */
    jshint: {
      options: {
          reporter: require('jshint-stylish')
      },
      app: [
        'scripts/js/modules/*.js',
        'scripts/js/app.js'
      ]
    },

    /**
     * CSS Metrics: Instant CSS metrics in CLI
     */
    cssmetrics: {
        common: {
            src: ['style.css'],
            options: {
                quiet: false,
                maxRules: 4096, //IE max rules
                maxFileSize: 1048576 //1mb in bytes
            }
        }
    },

    /**
     * Copy: Used for 1:1 copies. Useful for dist / release folders.
     */
    copy: {
      regImages: {
        src: [
          'images/*.{png,jpg,jpeg,gif,webp,svg}'
        ],
        dest: 'dist/'
      },
      sprite: {
        src: [
          'images/sprites/spritesheet.png'
        ],
        dest: 'dist/images/spritesheet.png'
      }
    },

    /**
     * Clean: Remove unused files before deployment
     */
    clean: {
      options: {
        force: true // Allows deletion of files outside of the current directory
      },
      js: [
        'scripts/js/main.js'
      ],
      sprite: [
        'images/sprites/spritesheet.png'
      ],
      distImages: [
        'dist/images/'
      ],
      hacks: [
        'dist/images/DONT_DELETE_ME.png',
      ]
    },

    /**
     * Concat: Used to concatenate JS files into one
     */
    concat: {
      dist: {
        src: [
          'scripts/js/lib/*.js',
          'scripts/js/modules/*.js',
          'scripts/js/app.js'
        ],
        dest: 'scripts/js/main.js'
      }
    },

    /**
     * Uglify: Minify JS files
     */
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> | Version <%= pkg.version %> | Last build: <%= grunt.template.today("dd-mm-yyyy h:MM:ss TT") %> */\n',
        sourceMap: true,
        compress: {
          drop_console: false // console.log errors in IE7.
        }
      },
      dist: {
        files: {
          'dist/scripts/main.min.js': ['<%= concat.dist.dest %>']
        }
      },
      deps: {
        files: {
          'dist/scripts/respond.min.js': ['bower_components/respond/dest/respond.src.js']
        }
      }
    },

    /**
     * ImageOptim: Used to optimise images [https://github.com/JamieMason/grunt-imageoptim]
     */
    imageoptim: {
      allImages: {
        src: [
          'dist/images'
        ]
      }
    },

    /**
     * Sprite Smith: Automatically compile sprite [https://github.com/Ensighten/grunt-spritesmith]
     */
    sprite:{
      all: {
        src: 'images/sprites/*.png',
        destDir: 'images/sprites/*',
        dest: 'images/sprites/spritesheet.png',
        destCss: 'styles/sass/objects/_sprite-paths.scss',
        imgPath: 'dist/images/spritesheet.png',
        cssFormat: 'css',
        'cssOpts': {
          // Some templates allow for skipping of function declarations
          'functions': false,
          // CSS template allows for overriding of CSS selectors
          'cssClass': function (item) {
            return '.sprite--' + item.name;
          }
        },
        algorithm: 'binary-tree',
        engine: 'pngsmith'
      }
    },

    /**
     * Watch: Watches for live file changes during development and executes the relevant task.
     */
    watch: {
      compass: {
        tasks: ['compass:compile'],
        files: [
          'styles/sass/*.scss',
          'styles/sass/**/*.scss'
        ]
      },
      scripts: {
        tasks: [
          'clean:js',
          'concat:dist',
          'uglify:dist',
          'jshint:app',
        ],
        files: [
          '<%= concat.dist.src %>']
      },
      images: {
        tasks: [
          'clean:distImages',
          'copy:regImages',
          'copy:sprite',
          'clean:hacks', /* Used to get around an issue with using 'watch' on an empty folder */
          'imageoptim:allImages'
        ],
        /**
         * There needs to be at least one image in this target folder in order for watch to recognise changes
         */
        files: [
          '<%= copy.regImages.src %>',
        ]
      },
      sprites: {
        tasks: [
          'clean:sprite',
          'sprite:all',
          'copy:sprite',
          'imageoptim:allImages'
        ],
        files: [
          '<%= sprite.all.destDir %>'
        ]
      }
    }
  });

  /**
   * Task: No tasks are currently configured.
   */

  // grunt.registerTask('images', ['clean:sprite', 'sprite:all', 'copy:regImages', 'copy:sprite', 'imageoptim:allImages']);

};
