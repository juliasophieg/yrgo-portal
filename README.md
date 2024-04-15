

## About Yrgo Portal

Yrgo Portal is a school project with the objective of creating an online prescence for the Yrgo schools LIA events.
Users can register as companies and as students and update their profiles.

## Setup

Clone repo

```bash
git clone [https://github.com/Karlsson2/yrgo-portal.git]
```

Install

```bash
npm install
```

and

```bash
composer install
```

Generate a env file and key

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
php artisan storage:link
```

Create a local sql database

Migrate

```bash
php artisan migrate
```

Seed

```bash
php artisan db:seed --class=TechnologiesSeeder
```

```bash
php artisan db:seed
```

```bash
php artisan db:seed --class=LikeSeeder
```

## Serve

To run start a vite and artisan server

```bash
npm run dev
```

```bash
php artisan serve
```
