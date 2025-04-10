FROM ubuntu:24.04

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y software-properties-common curl gnupg 

RUN add-apt-repository ppa:ondrej/php -y 

RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && \
    apt-get install -y nodejs

RUN apt-get install -y PHP8.2 PHP8.2-mcrypt PHP8.2-gd PHP8.2-curl PHP8.2-mysql PHP8.2-zip PHP8.2-xml PHP8.2-soap PHP8.2-intl PHP8.2-mbstring PHP8.2-bcmath

RUN apt-get install -y composer dos2unix && composer config --global process-timeout 1500

RUN apt-get remove apache2 -y && apt-get autoremove -y

COPY docker-scripts/setup-project.sh /usr/local/bin/setup-project.sh

RUN dos2unix /usr/local/bin/setup-project.sh

RUN chmod +x /usr/local/bin/setup-project.sh