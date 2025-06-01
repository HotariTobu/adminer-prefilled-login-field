FROM adminer
COPY ./prefilled-login-field.php /var/www/html/plugins/prefilled-login-field.php
USER root
RUN chmod 644 /var/www/html/plugins/prefilled-login-field.php
USER adminer
