
FROM nginx

COPY ./docker/nginx/cert/ca.crt /usr/local/share/ca-certificates/ca.crt

RUN update-ca-certificates
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data