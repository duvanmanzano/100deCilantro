FROM nginx:1.10-alpine

ADD development/vhost.conf /etc/nginx/conf.d/default.conf

COPY dist /var/www/public

COPY public /var/www/backend/public