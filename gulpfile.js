var gulp   = require('gulp'),
		sass = require('gulp-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		concat = require('gulp-concat');

gulp.task('default', ['styles', 'watch']);

gulp.task('styles', function() {
	return gulp.src('sass/**/*.scss')
		.pipe(sass({
			'sourcemap=none': true,
			errLogToConsole: true
		}))
		.pipe(concat('style.css'))
		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
		.pipe(gulp.dest('.'));
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
	gulp.watch('sass/**/*.scss', ['styles']);
});