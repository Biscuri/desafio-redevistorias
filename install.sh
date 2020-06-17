#! /bin/sh
file=.env
host=$1
port=$2
database=$3
username=$4
password=$5
sed -i 's/DB_HOST=.*/DB_HOST='$host'/' $file
sed -i 's/DB_PORT=.*/DB_PORT='$port'/' $file
sed -i 's/DB_DATABASE=.*/DB_DATABASE='$database'/' $file
sed -i 's/DB_USERNAME=.*/DB_USERNAME='$username'/' $file
sed -i 's/DB_PASSWORD=.*/DB_PASSWORD='$password'/' $file

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
composer install

php artisan key:generate
php artisan migrate
