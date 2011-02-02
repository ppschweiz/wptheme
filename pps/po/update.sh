#!/bin/sh
set -e
set -u

#php trunk/makepot.php wp-theme .. messages.pot
msgmerge de_DE.po messages.pot -o de_DE.new.po
mv de_DE.new.po de_DE.po
msgfmt -o de_DE.mo de_DE.po
