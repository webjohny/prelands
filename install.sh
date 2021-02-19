#!/bin/bash
# shellcheck disable=SC2164

if service --status-all | grep -Fq 'apache2'; then
  echo "Apache is exists"
else
  apt -y install aptitude && aptitude -y update && aptitude -y upgrade
  aptitude install -y apache2 nginx php7.2 php7.2-json php7.2-xml php7.2-xmlrpc php7.2-zip php7.2-readline php7.2-mbstring php7.2-gd php7.2-curl php7.2-common php7.2-cli php7.2-cgi libapache2-mod-php7.2 libapache2-mpm-itk curl php-cli php-mbstring git unzip composer
fi

apt install -y libapache2-mod-rpaf libapache2-mod-remoteip libapache2-mod-rewrite

a2enmod rewrite
a2enmod remoteip
a2enmod rpaf

chmod 777 -R shell
cd ./shell
./run.sh