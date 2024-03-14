#!/bin/bash

# Convert all image files in the current directory to WebP format

for file in *.{png,jpg,jpeg}; do
    if [ -f "$file" ]; then
        filename="${file%.*}"
        extension="${file##*.}"
        cwebp "$file" -o "${filename}.webp"
        echo "Converted $file to ${filename}.webp"
    fi
done

echo "Conversion complete."