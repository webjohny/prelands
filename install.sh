#!/bin/bash
# shellcheck disable=SC2164

apt install -y git

mkdir -m 777 /var/www
cd /var/www/

git clone https://github.com/webjohny/prelands

chmod 777 -R prelands
cd prelands/shell

./run.sh