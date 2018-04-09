'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

gulp.task('scripts', function () {
    return gulp.src('assets/src/cookiebar.js')
        .pipe(uglify())
        .pipe(rename(function(path) {
            path.extname = '.min' + path.extname;
        }))
        .pipe(gulp.dest('assets/dist'));
});

gulp.task('styles', function () {
    return gulp.src('assets/src/cookiebar.scss')
        .pipe(sass())
        .pipe(cleanCSS({restructuring: false}))
        .pipe(rename(function(path) {
            path.extname = '.min.css';
        }))
        .pipe(gulp.dest('assets/dist'));
});

gulp.task('default', ['scripts', 'styles']);
