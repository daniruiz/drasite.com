#!/bin/bash

FILES="src/*"
TARGET="./DRAsite.com-min"

shopt -s dotglob
shopt -s globstar

echo =============================================
echo ============= COPYING NEW FILES =============
echo =============================================
echo
echo

if [ -d $TARGET ]; then
	rm -rf $TARGET
fi

mkdir $TARGET
cp -a $FILES $TARGET


echo =============================================
echo ============= MINIFYING SOURCES =============
echo =============================================
echo
echo

HTMLFILES="$TARGET/**/*.html $TARGET/content/main.php"
JSFILES=$TARGET/content/**/*.js
CSSFILES=$TARGET/**/*.css

for i in $HTMLFILES; do
	echo Minifying HTML: $i
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
		"$i" > "$i".tmp
	mv -f "$i".tmp "$i"
done


for i in $CSSFILES; do
	echo Minifying CSS: $i
	uglifycss $i > "$i".tmp
	mv -f "$i".tmp "$i"
done

for i in $JSFILES
do
	echo Minifying JS: $i
	google-closure-compiler $i > "$i".tmp
	mv -f "$i".tmp $i
done

find $TARGET -type d -exec chmod 755 {} \;
find $TARGET -type f -exec chmod 644 {} \;
chown nobody:nobody $TARGET -R
