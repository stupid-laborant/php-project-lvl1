install: #install project
	composer install
brain-games: #launch brain games
	./src/Games/brain-games
validate:
	composer validate
init:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:
	./src/Games/brain-even
brain-calc:
	./src/Games/brain-calc