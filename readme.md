

## Usage

1. git clone https://github.com/GytisLaukaitis/FrontIt_task.git
2. Create DB for testing
3. Edit .env file & add these lines at the bottom

L5_SWAGGER_GENERATE_ALWAYS=true  
SWAGGER_VERSION=2.0  
L5_SWAGGER_CONST_HOST=localhost:8000  

4. Update project composer with: composer update
5. Optional(testing data): php artisan migrate:fresh --seed
6. Run php artisan serve
7. In browser open localhost:8000/api/documentaion

## Docker Usage
1. docker pull gytislaukaitisi/frontit:mysql


