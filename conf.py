# This .py file is a part of STEAMPHP, licensed under GNU GENERAL PUBLIC LICENSE v3.
# Made by moriczgergo a.k.a. skiilaa
# Created: 2017.01.19
# Last modified: 2017.01.19

# This .py file is used to configure Read My Docs

from recommonmark.parser import CommonMarkParser

source_parsers = {
	'.md': CommonMarkParser
}

source_suffix = ['.rst', '.md']