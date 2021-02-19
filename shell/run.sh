#!/bin/bash
# shellcheck disable=SC2164

projectsPath=/var/www;
current=$PWD

if service --status-all | grep -Fq 'apache2'; then
  echo "Apache is exists"
else
  apt -y update && apt -y upgrade
  apt install -y apache2 nginx php7.2 php7.2-json php7.2-xml php7.2-xmlrpc php7.2-zip php7.2-readline php7.2-mbstring php7.2-gd php7.2-curl php7.2-common php7.2-cli php7.2-cgi libapache2-mod-php7.2 libapache2-mpm-itk curl php-cli php-mbstring unzip composer
fi

apt install -y libapache2-mod-rpaf libapache2-mod-remoteip libapache2-mod-rewrite

a2enmod rewrite
a2enmod remoteip
a2enmod rpaf

#Templates
pathTmpls="$current/templates";
phpApacheSAConfPath="$pathTmpls/php/apacheSitesAvaliable";
phpNginxSAConfPath="$pathTmpls/php/nginxSitesAvaliable";
rpafMAConfPath="$pathTmpls/php/rpafModsAvailable";
nodejsNginxSAConfPath="$pathTmpls/nodejs/nginxSitesAvaliable";

projectName="prelands"
projectType=1
documentRoot=""
read -p "Domain: " projectDomain
if [ "$documentRoot" = "" ]; then
  documentRoot="$projectsPath/$projectName";
else
  documentRoot="$projectsPath/$projectName/$documentRoot";
fi

projectPath="$projectsPath/$projectName";
mkdir -m 777 "$projectPath";

nginxConf="/etc/nginx/sites-available/$projectName";
nginxConfSymbolic="/etc/nginx/sites-enabled/$projectName";

case "$projectType" in
	2 )
		cp "$nodejsNginxSAConfPath" "$nginxConf";
		ln -s "$nginxConf" "$nginxConfSymbolic";

		sed -i "s/{domain}/$projectDomain/g" "$nginxConf";
		sed -i "s~{documentRoot}~$documentRoot~g" "$nginxConf";

		service nginx restart;
	;;
	* )
		apacheConf="/etc/apache2/sites-available/$projectName.conf";
		apacheConfSymbolic="/etc/apache2/sites-enabled/$projectName.conf";

		cp "$phpApacheSAConfPath" "$apacheConf";
		cp "$phpNginxSAConfPath" "$nginxConf";
		cp "$rpafMAConfPath" "/etc/apache2/mods-available/rpaf.conf";
		ln -s "$apacheConf" "$apacheConfSymbolic";
		ln -s "$nginxConf" "$nginxConfSymbolic";
		ln -s "$nginxConf" "$nginxConfSymbolic";

		read -p "Directory path for Apache [/]: " directoryPath;
		if [ "$directoryPath" = "" ]; then
		  directoryPath="$projectsPath/$projectName";
		else
		  directoryPath="$projectsPath/$projectName/$directoryPath";
		fi

		sed -i "s/{domain}/$projectDomain/g" "$nginxConf";
		sed -i "s~{documentRoot}~$documentRoot~g" "$nginxConf";

		sed -i "s/{domain}/$projectDomain/g" "$apacheConf";
		sed -i "s~{documentRoot}~$documentRoot~g" "$apacheConf";
		sed -i "s~{directoryPath}~$directoryPath~g" "$apacheConf";

		a2ensite "$projectName";

		service apache2 restart;
		service nginx restart;
	;;
esac