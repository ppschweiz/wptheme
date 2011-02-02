#!/bin/sh
set -e
set -u
set -x

VERSION="$(grep ^Version: style.css | cut -d ' ' -f 2)-$(date +%s)"

#zip -r ../pps-theme-${VERSION}.zip -x@release.exclude -i '*.php'
zip -r ../pps-theme-${VERSION}.zip . -i@release.include
echo $VERSION
