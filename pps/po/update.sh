#!/bin/sh
set -e
set -u

#php trunk/makepot.php wp-theme .. messages.pot
msgmerge de_DE.po messages.pot -o de_DE.new.po
mv de_DE.new.po de_DE.po

msgmerge fr_FR.po messages.pot -o fr_FR.new.po
mv fr_FR.new.po fr_FR.po

msgmerge it_IT.po messages.pot -o it_IT.new.po
mv it_IT.new.po it_IT.po

msgfmt -o de_DE.mo de_DE.po
msgfmt -o fr_FR.mo fr_FR.po
msgfmt -o it_IT.mo it_IT.po
