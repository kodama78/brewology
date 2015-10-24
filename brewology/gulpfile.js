var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');
var plumber = require('gulp-plumber');
var livereload = require('gulp-livereload');

gulp.task('less', function () {
    gulp.src('less/global.less')
        .pipe(plumber())
        .pipe(less())
        .pipe(gulp.dest('css/'))
        .pipe(livereload());
});
gulp.task('css', function(){
   gulp.src('css/theme_css/*.css')
       .pipe(plumber())
       .pipe(gulp.dest('css/'))
});
gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('less/*.less', ['less']);
    gulp.watch('css/theme_css/*.css', ['css']);
});

gulp.task('default', ['less', 'css', 'watch']);
