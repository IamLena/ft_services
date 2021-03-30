FROM	alpine:latest

RUN		apk update && apk upgrade
RUN		apk add nginx openssl openssh supervisor

RUN		mkdir -p /run/nginx && chown -R nginx:nginx /run/nginx

COPY	./nginx.conf /etc/nginx/.
COPY	index.html /data/app/index.html

RUN		openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
		-keyout /etc/nginx/ssl/key.key \
		-out /etc/nginx/ssl/cert.crt \
		-subj "/C=RU/ST=Moscow/L=Moscow/O=42/OU=21/CN=localhost"

COPY		./supervisord.conf /etc/supervisord.conf
RUN			chmod +rw /etc/supervisord.conf

COPY		./start.sh /tmp/start.sh
RUN			chmod u+x /tmp/start.sh

EXPOSE		443 80 22

ENTRYPOINT	sh /tmp/start.sh
