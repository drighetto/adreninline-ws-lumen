// including plugins
var gulp = require('gulp'), less = require("gulp-less"), concat = require('gulp-concat');

// task
gulp.task('default', function () {
    gulp.src('./resources/assets/less/app.less') 
            .pipe(less())
            .pipe(gulp.dest('./public/css'));

    gulp.src(['./vendor/bower_components/jquery/dist/jquery.js',
              './vendor/bower_components/bootstrap/dist/js/bootstrap.js',
              './resources/assets/js/custom.js'])
            .pipe(concat('app.js'))
            .pipe(gulp.dest('./public/js'));

    gulp.src(['./vendor/bower_components/bootstrap/fonts/*.*', './vendor/bower_components/font-awesome/fonts/*.*'])
            .pipe(gulp.dest('./public/fonts'));
});