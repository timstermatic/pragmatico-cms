#!/usr/bin/env bash

apt-get update
# Apache & PHP
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get update
sudo apt-get -y install mysql-server-5.5 php5-mysql apache2 php5 php5-curl php5-gd php5-mcrypt

# Add ServerName to httpd.conf
# Setup hosts file
VHOST=$(cat <<EOF
DocumentRoot "/vagrant"
ServerName localhost
<Directory "/vagrant">
allow from all
Options +Indexes
</Directory>
EOF
)

echo "${VHOST}" > /etc/apache2/sites-available/default
a2enmod rewrite
service apache2 restart

# create database 
if [ ! -f /var/log/dbinstalled ];
then
  echo "CREATE DATABASE cms" | mysql -uroot -prootpass
  touch /var/log/dbinstalled
  #if [ -f /vagrant/data/initial.sql ];
  #then
  #  mysql -uroot -pROOTPASSWORD internal < /vagrant/data/initial.sql
  #fi
fi

rm -rf /var/www
ln -fs /vagrant /var/www
mkdir -p /vagrant/tmp/{cache/{models,persistent,views},sessions,logs,tests}
