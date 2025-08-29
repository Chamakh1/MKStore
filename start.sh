#!/bin/bash
# Remplacer les variables dans nginx.conf
envsubst '\$PORT' < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf

# Démarrer supervisord
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf