#!/bin/sh

docker run --rm -v $(pwd):/opt -w /opt laravelsail/php81-composer:latest composer install
vendor/bin/sail up -d --remove-orphans --force-recreate
docker-compose exec app npm install
docker-compose exec app npm run dev

# docker-compose exec app php artisan migrate
# docker-compose exec app php artisan elastic:migrate:Fresh
# docker-compose exec app php artisan db:seed SourceSeeder
# docker-compose exec app php artisan igdb:sync
# docker-compose exec app php artisan youtube:sync
# docker-compose exec app php artisan db:seed
# docker-compose exec app php artisan scount:import App\Models\Game
# docker-compose exec app php artisan scount:import App\Models\Guest
# docker-compose exec app php artisan scount:import App\Models\Tag
# docker-compose exec app php artisan scount:import App\Models\Video
