const gulp 			= require('gulp'),
	  sass 			= require('gulp-sass'),
	  autoprefixer	= require('gulp-autoprefixer'),
	  csso			= require('gulp-csso');

gulp.task('default', ['sass']);

gulp.task('sass', () => {
	return gulp.src(['sass/style.scss'])
			   .pipe(sass().on('error', sass.logError))
			   .pipe(autoprefixer())
			   .pipe(csso())
			   .pipe(gulp.dest('.'));
});

gulp.task('watch', () => {
	gulp.watch('sass/*.scss', ['sass']);
});