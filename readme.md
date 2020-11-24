

## Usage

1. git clone https://github.com/GytisLaukaitis/FrontIt_task.git
2. inside project run: composer install
3. Create .env file using .env.example and edit these lines  


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
SWAGGER_VERSION=2.0  
L5_SWAGGER_CONST_HOST=localhost:8000  
```  

4. `php artisan key:generate`
5. `php artisan migrate:fresh --seed`
6. Run php artisan serve
7. In browser open localhost:8000/api/documentaion

## Docker Usage
0. First 3 steps from Usage section.
1. `docker-compose up -d`
2. `docker ps` shows your app cointainer id
3. `docker exec -it (container id) bash`
4. `php artisan migrate:fresh --seed`
5. `php artisan key:generate`
6. In browser open localhost:8000/api/documentaion


