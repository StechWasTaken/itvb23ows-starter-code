FROM mysql:8.0.36
# RUN groupadd -r mysql && useradd -r -g mysql mysql
# RUN chown -R mysql:mysql /var/lib/mysql
# USER mysql
COPY ./hive.sql .
EXPOSE 3306