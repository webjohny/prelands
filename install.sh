#!/bin/bash
# shellcheck disable=SC2164

apt install -y git

cd /var/www/

git clone https://github.com/webjohny/prelands

chmod 777 -R prelands
cd prelands

./run.sh