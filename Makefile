#Make makes things easier

UNIT=./vendor/bin/phpunit

test:
	$(UNIT)	
card:
	$(UNIT) ./tests/CardTest
deck:
	$(UNIT) ./tests/DeckTest
