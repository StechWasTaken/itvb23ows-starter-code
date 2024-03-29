# Use MySQL 8.0.36 as the base image
FROM mysql:8.0.36
COPY ./hive.sql /docker-entrypoint-initdb.d/hive.sql
EXPOSE 3306
