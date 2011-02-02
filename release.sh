#!/bin/sh
set -e
set -u
set -x

VERSION="$(grep ^Version: pps/style.css | cut -d ' ' -f 2)-$(date +%s)"

zip -r pps-theme-${VERSION}.zip . -i@release.include
