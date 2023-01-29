
FROM php:8.0-fpm-bullseye  
# ② メタデータを追加
LABEL maintainer="ucan-lab <yes@u-can.pro>" 
# ③ デフォルトのシェルをオーバーライド
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"] 

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer
# ------

# ⑤ composer をインストール
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer 
# --- ⑥ イメージ上に任意のコマンドを実行 ---
RUN apt-get update && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev unzip locales && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8 && \
  mkdir /var/run/php-fpm && \
  docker-php-ext-install intl pdo_mysql zip bcmath && \
  composer config -g process-timeout 3600 && \
  composer config -g repos.packagist composer https://packagist.org
# ------

# ⑦ zzz-www.conf をコンテナにコピー
COPY ./infra/docker/php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
# ⑧ php.ini をコンテナにコピー
COPY ./infra/docker/php/php.ini /usr/local/etc/php/php.ini

# ⑨ 作業ディレクトリを指定
WORKDIR /work/backend