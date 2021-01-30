current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

# 🐘 Composer
composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

.PHONY: composer-install
composer-install: CMD=install

.PHONY: composer-update
composer-update: CMD=update

.PHONY: composer-require
composer-require: CMD=require
composer-require: INTERACTIVE=-ti --interactive

.PHONY: composer
composer composer-install composer-update composer-require: composer-env-file
	@php composer.phar $(CMD)

.PHONY: test
test: composer-env-file
	./vendor/bin/phpunit tests/

quality:
	./vendor/bin/psalm
