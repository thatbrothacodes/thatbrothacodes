# Use node 1.13.9 LTS
FROM nginx:1.13.9
ENV LAST_UPDATED 20180320T125800

COPY /client /client

WORKDIR /client

COPY /client /usr/share/nginx/html

# Expose Container Port
EXPOSE 80

# copy local NGINX config to NGINX server
COPY /server/nginx.config /etc/nginx/conf.d/default.conf
