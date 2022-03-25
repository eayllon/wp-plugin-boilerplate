#!/bin/sh

# IMPORTANT: Execute this script inside the plugin folder "sh bin/build.sh"

MODULE_SLUG=${PWD##*/}
PROJECT_PATH=$(pwd)
BUILD_PATH="${PROJECT_PATH}/build"
DEST_PATH="$BUILD_PATH/$MODULE_SLUG"

cd "$PROJECT_PATH";

echo "Generating build directory..."
rm -rf "$BUILD_PATH"
mkdir -p "$DEST_PATH"

echo "Syncing files..."
rsync -rc --exclude-from="$PROJECT_PATH/.distignore" "$PROJECT_PATH/" "$DEST_PATH/" --delete --delete-excluded

echo "Generating zip file..."
cd "$BUILD_PATH" || exit
zip -q -r "${MODULE_SLUG}.zip" "$MODULE_SLUG/"

cd "$PROJECT_PATH" || exit
mv "$BUILD_PATH/${MODULE_SLUG}.zip" "$PROJECT_PATH"
echo "${MODULE_SLUG}.zip file generated!"

rm -rf "$BUILD_PATH"

echo "Build done!"