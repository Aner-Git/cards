#Make makes things easier

test:
	./vendor/bin/phpunit
card:
	./vendor/bin/phpunit ./tests/CardTest
