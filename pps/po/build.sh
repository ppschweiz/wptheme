#!/bin/sh
set -e
set -u

msgfmt -o de_DE.mo de_DE.po
msgfmt -o fr_FR.mo fr_FR.po
msgfmt -o it_IT.mo it_IT.po
