# breeze
laravel breeze

# use
```
mkdir hoge
cd hoge
```

```
git clone https://github.com/takaharu-niki/breeze.git
```

```
mkdir db
```

```
docker-compose up --build -d
```

```
docker-compose exec php composer install
```

```
cd src/laravel
sed -e s/DB_HOST=127.0.0.1/DB_HOST=mysql/ -e s/DB_PASSWORD=/DB_PASSWORD=password/ .env.example  > .env
```

```
docker-compose exec php php artisan key:generate
```

```
docker-compose exec php npm install
```

```
docker-compose exec php npm run dev
```

# env
```
docker --version
Docker version 20.10.5, build 55c4c88
```
```
docker-compose --version
docker-compose version 1.29.0, build 07737305
```
