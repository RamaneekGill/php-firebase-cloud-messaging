.PHONY: tests

tests:
	vendor/bin/phpunit

coverage:
	rm -rf coverage
	vendor/bin/phpunit --coverage-html coverage
