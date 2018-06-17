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

./misc/svg-cleaner/ffsvg.sh $TARGET

chown nobody:nobody $TARGET -R
chmod 777 $TARGET -R
find $TARGET -type d -exec chmod 777 {} \;


HTMLFILES=$TARGET/**/*.html
CSSFILES=$TARGET/**/*.css

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

for i in $CSSFILES
do
    echo $i
	uglifycss $i > "$i".tmp
	mv -f "$i".tmp "$i"
done

chown nobody:nobody $TARGET -R
chmod 644 $TARGET -R
find $TARGET -type d -exec chmod 755 {} \;
