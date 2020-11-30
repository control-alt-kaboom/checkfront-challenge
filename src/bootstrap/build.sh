#!/bin/bash

composer install
php artisan migrate:fresh --seed

exit 0;