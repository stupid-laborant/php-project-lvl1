install: #install project
	composer install
brain-games: #launch brain games
	./bin/brain-games
validate:
	composer validate
init:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:
	./bin/brain-even
brain-calc:
	./bin/brain-calc
brain-gcd:
	./bin/brain-gcd