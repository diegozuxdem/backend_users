#!/bin/bash

mysqlRoot="root";
mysqlPassword="root";
mysqlDevUser="devdem";
mysqlDevPass="yurglazbr0uken666";
databaseName="rti1";
sqlFile="/vagrant/data/sql/users_rti1.sql"

echo "Crear usuario y base de datos";
if [ $(mysql -N -s -u$mysqlRoot -p$mysqlPassword -e \
"SELECT EXISTS(SELECT 1 FROM mysql.user WHERE user = '$mysqlDevUser');") -eq 0 ]; then
    mysql -u$mysqlRoot -p$mysqlPassword -e "CREATE USER '$mysqlDevUser'@localhost IDENTIFIED BY '$mysqlDevPass';";
else
    echo "Usuario previamente creado"
fi

mysql -u$mysqlRoot -p$mysqlPassword -e "CREATE DATABASE IF NOT EXISTS $databaseName DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;";
mysql -u$mysqlRoot -p$mysqlPassword -e "GRANT ALL PRIVILEGES ON $databaseName.* TO $mysqlDevUser@localhost IDENTIFIED BY '$mysqlDevPass';";
echo "Replicar base de datos";
mysql -u$mysqlDevUser -p$mysqlDevPass $databaseName < $sqlFile;
