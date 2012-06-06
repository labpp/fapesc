#! /bin/sh -
echo - Setting permissions
/var/www/fapesc/cmd/chmod.sh
echo - Updating entities
/var/www/fapesc/cmd/entities.sh
echo - Cleaning entities
/var/www/fapesc/cmd/clean.sh
echo - Updating database
/var/www/fapesc/cmd/force.sh
echo - Cleaning cache
/var/www/fapesc/cmd/cache.sh
