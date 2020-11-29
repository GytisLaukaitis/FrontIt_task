

## Docker Usage

1. `git clone https://github.com/GytisLaukaitis/FrontIt_task.git`
2. `cp .env.example .env` 
3. `docker-compose up -d`
4. `docker exec -it frontit_task_app_1 bash`  
     Inside docker container run:
5. `composer install`
6. `php artisan migrate:fresh --seed`
7. `php artisan key:generate`
8.  [localhost:8001/api/documentation](localhost:8001/api/documentation)


