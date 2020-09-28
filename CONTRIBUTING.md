# Contributing
## How to develop/update
### Requirements
1   Docker
1   Docker Compose

### Steps
1   After cloning, run `docker-compose build` to build your env.
1   Run `docker-compose run --rm -T ${PWD##*/} composer install`.
1   Run `docker-compose run --rm -T ${PWD##*/} ./vendor/bin/phpunit-watcher watch` to watch for unit test and file changes.
1   Run `docker-compose run --rm -T ${PWD##*/} ./bin/cli-app` to run the application.
