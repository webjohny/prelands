#!/bin/bash

projectsPath=/var/www;
current=$PWD

#Templates
pathTmpls="$current/templates";
phpApacheSAConfPath="$pathTmpls/php/apacheSitesAvaliable";
phpNginxSAConfPath="$pathTmpls/php/nginxSitesAvaliable";
rpafMAConfPath="$pathTmpls/php/rpafModsAvailable";
nodejsNginxSAConfPath="$pathTmpls/nodejs/nginxSitesAvaliable";

read -p "Project name: " projectName
read -p "Type [1=PHP (default), 2=Nodejs]: " projectType
read -p "Domain: " projectDomain
read -p "Document root [/]: " documentRoot
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