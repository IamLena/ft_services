FROM		alpine:latest

RUN			apk update && apk upgrade
RUN			apk add nginx openrc supervisor php7-mbstring \
            php7-session php7-json php7-mysqli php7 php7-fpm

RUN			mkdir -p /run/nginx && chown -R nginx:nginx /run/nginx
RUN			adduser -D -g 'www' www
RUN			mkdir /www && chown -R www:www /var/lib/nginx && chown -R www:www /www
COPY		nginx.conf /etc/nginx/conf.d/default.conf

ADD			https://wordpress.org/latest.tar.gz /etc/
RUN			tar -xf /etc/latest.tar.gz -C /etc > /dev/null && rm -f /latest.tar.gz > /dev/null
RUN			mv /etc/wordpress /www/

COPY		./wp-config.php /www/wordpress/
RUN			chmod u+x /www/wordpress/wp-config.php

COPY		supervisord.conf /etc/supervisord.conf
RUN			chmod +rw /etc/supervisord.conf

COPY		./start_wp.sh /tmp/start.sh
RUN			chmod u+x /tmp/start.sh
ENTRYPOINT	sh /tmp/start.sh

EXPOSE		5050

ENTRYPOINT	sh /tmp/start.sh
