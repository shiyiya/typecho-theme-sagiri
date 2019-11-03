#!/bin/sh

rm -Rf temp

mkdir temp
mkdir temp/assert
mkdir temp/component
mkdir temp/libray
mkdir temp/util
mkdir temp/js
mkdir temp/css
mkdir temp/doc

cp -f ./*.php ./temp
cp -f ./*.js ./temp
cp -f ./*.md ./temp
cp -f  ./package.json ./temp
cp -f ./*.png ./temp
cp -f ./js/* ./temp/js/
cp -f ./css/* ./temp/css/
cp -f ./doc/* ./temp/doc/
cp -f ./component/* ./temp/component/
cp -Rf ./libray/* ./temp/libray/
cp -Rf ./util/* ./temp/util/