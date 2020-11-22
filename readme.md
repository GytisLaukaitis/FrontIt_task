

## Usage

1. git clone https://github.com/GytisLaukaitis/FrontIt_task.git
2. Create DB for testing
3. Edit .env file & add these lines at the bottom

L5_SWAGGER_GENERATE_ALWAYS=true  
SWAGGER_VERSION=2.0  
L5_SWAGGER_CONST_HOST=localhost:8000  

4. Update project composer with: composer update
5. Run php artisan serve
6. In browser open localhost:8000/api/documentaion

## Docker Usage
1. docker-compose up -d
2. localhost:8000/api/documentaion


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
