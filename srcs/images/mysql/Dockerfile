FROM	alpine:latest

RUN		apk update && apk upgrade\
		&& apk add mariadb mariadb-client openrc

COPY	create_db.sql .
COPY	my.cnf /etc/
RUN		chmod 0444 /etc/my.cnf
COPY	start_mysql.sh .
RUN		chmod +x start_mysql.sh

VOLUME	["/sys/fs/cgroup"]
VOLUME	["/var/lib/mysql"]

EXPOSE	3306

CMD		sh start_mysql.sh
