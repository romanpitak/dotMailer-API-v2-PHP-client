
.PHONY: test clean

vendor: composer.json
	composer install

api_wadl.xml:
	curl 'http://api.dotmailer.com/v2/help/wadl' --output $@

test: vendor api_wadl.xml
	phpunit

build/html/coverage: vendor api_wadl.xml
	phpunit --coverage-html $@

clean:
	rm --force -- api_wadl.xml
	rm --recursive --force -- vendor
	rm --recursive --force -- build
