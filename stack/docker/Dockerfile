FROM itdevgroup/php-fpm7.4

ARG INSTALL_XDEBUG=false

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
      apt-get update -yqq \
      && apt-get install -yqq \
      php7.4-xdebug \
;fi

WORKDIR /usr/local/src/accounts

EXPOSE 9000
