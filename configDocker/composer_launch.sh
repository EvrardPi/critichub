#!/bin/bash

cd /var/www/html
composer update
composer install
apachectl start
sleep infinity