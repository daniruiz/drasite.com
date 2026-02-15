#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'

# -----------------------------
# CONFIG
# -----------------------------
SRC_DIR="src"
TARGET="./DRAsite.com-min"
OWNER="www-data:www-data"
OPTIMIZE_IMAGES=yes

# -----------------------------
# CHECK DEPENDENCIES
# -----------------------------
for cmd in html-minifier-terser uglifyjs cssmin jpegoptim optipng; do
    if ! command -v "$cmd" &> /dev/null; then
        echo "Error: $cmd not installed"
        exit 1
    fi
done


echo "============================================="
echo "============= COPYING FILES ================="
echo "============================================="

rm -rf "$TARGET"
mkdir -p "$TARGET"

cp -a -v "$SRC_DIR"/. "$TARGET"/


echo "============================================="
echo "============= MINIFYING HTML ================"
echo "============================================="

find "$TARGET" -type f \( -name "*.html" -o -name "*.php" \) | while read -r file; do
    echo "Minifying HTML: $file"
    tmpfile="${file}.tmp"

    # minify mantiene bloques PHP correctamente
    html-minifier-terser \
        --ignore-custom-fragments "(<{ [^}>]* }>)|(<\?php(.|\n)+?\?>)" \
        --remove-comments \
        --minify-css \
        --minify-js \
        --collapse-whitespace \
        --quote-character "'" \
        --remove-script-type-attributes \
        --remove-style-link-type-attributes \
        --remove-tag-whitespace \
        -o "$tmpfile" \
        "$file" || {
        echo "⚠ Error minifying $file"
        continue
    }

    mv -f "$tmpfile" "$file"
done


echo "============================================="
echo "============= MINIFYING CSS ================="
echo "============================================="

find "$TARGET" -type f -name "*.css" | while read -r file; do
    echo "Minifying CSS: $file"
    tmpfile="${file}.tmp"

    cssmin < "$file" > "$tmpfile" || {
        echo "⚠ Error minifying $file"
        continue
    }

    mv -f "$tmpfile" "$file"
done


echo "============================================="
echo "============= MINIFYING JS =================="
echo "============================================="

find "$TARGET" -type f -name "*.js" | while read -r file; do
    echo "Minifying JS: $file"
    tmpfile="${file}.tmp"

    uglifyjs "$file" -c -m -o "$tmpfile" || {
        echo "⚠ Error minifying $file"
        continue
    }

    mv -f "$tmpfile" "$file"
done


echo "============================================="
echo "============= FIXING PERMISSIONS ============"
echo "============================================="

find "$TARGET" -type d -exec chmod 755 {} +
find "$TARGET" -type f -exec chmod 644 {} +

#chown -R "$OWNER" "$TARGET"


echo "============================================="
echo "============= OPTIMIZING IMAGES ============="
echo "============================================="

# JPG / JPEG
find "$TARGET" -type f \( -iname "*.jpg" -o -iname "*.jpeg" \) | while read -r file; do
    echo "Optimizing JPG: $file"
    [ $OPTIMIZE_IMAGES = yes ] && jpegoptim --strip-all --all-progressive "$file" >/dev/null 2>&1 || true
done

# PNG (lossless)
find "$TARGET" -type f -iname "*.png" | while read -r file; do
    echo "Optimizing PNG: $file"
    [ $OPTIMIZE_IMAGES = yes ] && optipng -quiet -o2 "$file" >/dev/null 2>&1 || true
done

echo "✔ Build completado correctamente."
