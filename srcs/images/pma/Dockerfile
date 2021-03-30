FROM		alpine:latest

RUN			apk update && apk upgrade
RUN			apk add nginx openrc supervisor php7-mbstring \
            php7-session php7-json php7-mysqli php7 php7-fpm

RUN			mkdir -p /run/nginx && chown -R nginx:nginx /run/nginx
RUN			adduser -D -g 'www' www
RUN			mkdir /www && chown -R www:www /var/lib/nginx && chown -R www:www /www
COPY		nginx.conf /etc/nginx/conf.d/default.conf

ADD			https://files.phpmyadmin.net/phpMyAdmin/5.0.4/phpMyAdmin-5.0.4-all-languages.tar.gz /etc/
RUN			tar -xf /etc/phpMyAdmin-5.0.4-all-languages.tar.gz -C /etc/ && rm -f /phpMyAdmin-5.0.4-all-languages.tar.gz > /dev/null
RUN			mv /etc/phpMyAdmin-5.0.4-all-languages /www/phpmyadmin
COPY		./config.inc.php /www/phpmyadmin/config.inc.php
RUN			chmod u+x /www/phpmyadmin/config.inc.php

COPY		supervisord.conf /etc/supervisord.conf
RUN			chmod +rw /etc/supervisord.conf

COPY		./start_pma.sh /tmp/start.sh
RUN			chmod u+x /tmp/start.sh
ENTRYPOINT	sh /tmp/start.sh

EXPOSE		5000

ENTRYPOINT	sh /tmp/start.sh
