.PHONY: tests

tests:
	vendor/bin/phpcs --standard=PSR2 --ignore=vendor --extensions=php .
	vendor/bin/phpunit

coverage:
	rm -rf coverage
	vendor/bin/phpunit --coverage-html coverage

fix:
	vendor/bin/php-cs-fixer --standard=PSR2 fix .
