GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'password';
CREATE DATABASE wordpress;
CREATE USER 'test'@'%' IDENTIFIED BY 'test';
GRANT ALL PRIVILEGES ON wordpress TO 'test'@'%';
FLUSH PRIVILEGES;
