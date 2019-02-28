#!/bin/bash

FILES="src/*"
TARGET="./DRAsite.com-min"

shopt -s dotglob
shopt -s globstar

echo =============================================
echo ============= COPYING NEW FILES =============
echo =============================================
echo -e "\n\n"

if [ -d $TARGET ]; then
    rm -rf $TARGET
fi

mkdir $TARGET

cp -r $FILES $TARGET


echo =============================================
echo ============= MINIFYING SOURCES =============
echo =============================================
echo -e "\n\n"

#./misc/svg-cleaner/ffsvg.sh $TARGET

chown nobody:nobody $TARGET -R
chmod 777 $TARGET -R
find $TARGET -type d -exec chmod 777 {} \;


HTMLFILES=$TARGET/**/*.html
JSFILES=$TARGET/**/*.js
CSSFILES=$TARGET/**/*.css

mv $TARGET/content/main.php $TARGET/content/main.php.html

for i in $HTMLFILES
do
    echo $i
	html-minifier \
        --ignore-custom-fragments "(<{ [^}>]* }>)|(<\?php((?!\?>).\n?)*\?>)" \
		--remove-comments \
		--minify-css \
		--minify-js \
		--collapse-whitespace \
		--quote-character "'" \
		--remove-script-type-attributes \
		--remove-style-link-type-attributes \
		--remove-tag-whitespace \
		$i > "$i".tmp		
	mv -f "$i".tmp "$i"
done

mv $TARGET/content/main.php.html $TARGET/content/main.php



for i in $CSSFILES
do
    echo $i
	uglifycss $i > "$i".tmp
	mv -f "$i".tmp "$i"
done

for i in $JSFILES
do
    echo $i
    #google-closure-compiler --compilation_level=ADVANCED_OPTIMIZATIONS --strict_mode_input --jscomp_off=checkVars --externs externs.js $i | tee "$i".tmp
    google-closure-compiler $i | tee "$i".tmp
	mv -f "$i".tmp $i
done

chown nobody:nobody $TARGET -R
chmod 644 $TARGET -R
find $TARGET -type d -exec chmod 755 {} \;
