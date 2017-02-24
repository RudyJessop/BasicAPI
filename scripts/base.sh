#! /bin/sh
echo ">>> Creating mobile Database "
mysql --user="root" --password="root" -e "FLUSH PRIVILEGES;"
mysql --user="root" --password="root" -e "CREATE DATABASE mobile;"


echo ">>> Uninstalling HHVM (Bug issues)"

sudo /usr/share/hhvm/uninstall_fastcgi.sh

sudo apt-get remove hhvm -y

sudo service apache2 restart

echo ">>> Binding ip address redis.conf"

sed -i '/^bind/s/bind.*=.*/bind = 0.0.0.0/' /etc/redis/redis.conf


echo ">>>> Installing PHP 7"
PHP_VERSION=$(php -v | tail -r | tail -n 1 | cut -d " " -f 2 | cut -c 1-3)
if [$PHP_VERSION -lt "7.0"]; then
  sudo apt-get install python-software-properties software-properties-common
  sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
  sudo apt-get upgrade

  # Removing php5 modules
  sudo apt-get -y purge php5 libapache2-mod-php5 php5 php5-cli php5-common php5-curl php5-gd php5-imap php5-intl php5-json php5-mcrypt php5-mysql php5-pspell php5-readline php5-sqlite
  sudo apt-get autoremove
  sudo apt-get update

  sudo apt-get install -y php7.0
  sudo apt-get install -y php7.0 php7.0-mysql php7.0-gd php7.0-xml php7.0-mbstring php7.0-zip php7.0-mcrypt php7.0-curl php7.0-intl php7.0-xsl libapache2-mod-php7.0 php7.0-common php7.0-cli php7.0-imap php7.0-json php7.0-pspell php7.0-readline php7.0-sqlite php7.0-memcached

  sudo apt-get -f install

  sudo service apache2 restart
else
  echo "PHP Version is good"
  echo "Current Version"$PHP_VERSION
fi


# echo "Laravel Passport/ Lumen install"

# php artisan migrate --tag=oauth-migrations --path=vendor/laravel/passport/database/migrations

