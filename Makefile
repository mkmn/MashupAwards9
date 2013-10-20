PHP=$(shell which php)
CURL=$(shell which curl)

setup:
	$(PHP) -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
	$(CURL) -SslO https://raw.github.com/brtriver/dbup/master/dbup.phar

install: setup
	$(PHP) composer.phar install

update:
	$(PHP) conposer.phar update
