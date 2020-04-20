FROM itdevgroup/php-fpm7.2

ARG INSTALL_XDEBUG=false

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
      apt-get update -yqq \
      && apt-get install -yqq \
      php7.2-xdebug \
;fi

WORKDIR /usr/local/src/accounts

EXPOSE 9000
