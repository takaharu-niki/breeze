# use
```
git clone https://github.com/takaharu-niki/todoWithLaravelBreeze.git
```

```
cd todoWithLaravelBreeze
docker-compose up -d
```

```
cd src/laravel
docker-compose exec -w /var/www/html/laravel php composer install
```

```
sed -e s/APP_KEY=/APP_KEY=base64:R8pVxgXih7oMjNIwcBrsTQX9iHRPN7+b1M0UxXZ0C+U=/ -e s/DB_HOST=127.0.0.1/DB_HOST=mysql/ -e s/DB_PASSWORD=/DB_PASSWORD=password/ .env.example  > .env
```

```
docker run --rm -v $PWD:/usr/src/app -w /usr/src/app node npm install
docker run --rm -v $PWD:/usr/src/app -w /usr/src/app node npm run dev
```
