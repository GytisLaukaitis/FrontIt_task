

## Docker Usage

1. `git clone https://github.com/GytisLaukaitis/FrontIt_task.git`
2. `cp .env.example .env`  and edit these lines:


```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laraapp_db
DB_USERNAME=root
DB_PASSWORD=
```
and at the bottom of .env

```bash
L5_SWAGGER_GENERATE_ALWAYS=true  
L5_SWAGGER_CONST_HOST=localhost:8001   
```  

3. `docker-compose up -d`
4. `docker ps` shows your app cointainer id
5. `docker exec -it (container id) bash` & `composer install`
6. `php artisan migrate:fresh --seed`
7. `php artisan key:generate`
8. In browser open localhost:8001/api/documentaion


