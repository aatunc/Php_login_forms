# 7.4 läuft
FROM php:7.4-apache

# Mysql treiber eingebunden
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# PDO treiber install
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y

# kleiner Fehler deshalb beim Starten
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN service apache2 restart 