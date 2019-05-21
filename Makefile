.PHONY: phpstan phpcs phpmd phpunit qa

DOCKER=docker run -u $(shell id -u):$(shell id -g) -v $(shell pwd):/app -w /app jeckel/php-test:7.3-cli-alpine

phpstan:
	@${DOCKER} vendor/bin/phpstan analyse

phpcs:
	@${DOCKER} vendor/bin/phpcs

phpmd:
	@${DOCKER} vendor/bin/phpmd src text cleancode,codesize,design,naming,unusedcode

phpunit:
	@${DOCKER} vendor/bin/phpunit --coverage-text

qa: phpstan phpmd phpcs phpunit
