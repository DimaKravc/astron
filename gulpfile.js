const gulp = require('gulp');
const sass = require('gulp-sass');
const prefixer = require('gulp-autoprefixer');
const svgSprite = require('gulp-svg-sprite');
const sourcemaps = require('gulp-sourcemaps');

sass.compiler = require('node-sass');

gulp.task('sass', function (done) {
    gulp.src('./scss/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            'outputStyle': 'expanded',
            'indentType': 'tab',
            'indentWidth': 1
        }).on('error', sass.logError))
        .pipe(prefixer({
            browsers: ['> 10%', 'last 2 versions', 'ie 10']
        }))
        .pipe(sourcemaps.write('./maps/'))
        .pipe(gulp.dest('./'))
    done();
});

gulp.task('svgSprite', function () {
    return gulp.src('./images/sprite-parts/*.svg') // svg files for sprite
        .pipe(svgSprite({
                mode: {
                    stack: {
                        sprite: "../sprite.svg"  //sprite file name
                    }
                },
            }
        ))
        .pipe(gulp.dest('./images/'));
});

gulp.task('watch', function (done) {
    gulp.watch('./scss/**/*.*', gulp.series('sass'))
    done();
});

gulp.task('default', gulp.series('sass', 'svgSprite', 'watch'));