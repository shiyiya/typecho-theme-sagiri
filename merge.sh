#!/bin/sh

rm -Rf temp

mkdir temp
mkdir temp/assert
mkdir temp/component
mkdir temp/libray
mkdir temp/util
mkdir temp/util/sw
mkdir temp/js
mkdir temp/css
mkdir temp/doc

cp -Rf ./assert/**/ ./temp/assert/
cp -f ./*.php ./temp
cp -f ./*.js ./temp
cp -f ./*.md ./temp
cp -f  ./package.json ./temp
cp -f ./*.png ./temp
cp -f ./js/* ./temp/js/
cp -f ./css/iconfont.min.css ./temp/css/
cp -f ./css/mix.min.css ./temp/css/
cp -f ./doc/* ./temp/doc/
cp -f ./component/* ./temp/component/
cp -Rf ./libray/* ./temp/libray/

cp -Rf ./util/*.min.js ./temp/util/
cp -Rf ./util/sw/*.json ./temp/util/sw/
cp -Rf ./util/sw/*.min.js ./temp/util/sw/