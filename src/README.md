**lagc-backend**


Project setup:
```
1. git clone
2. cp .env.example .env
   - change database, mail settings
3. composer install
4. php artisan key:generate
5. php artisan jwt:secret
6. php artisan migrate:refresh --seed
```