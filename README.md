# Laravel Socialite
example social lite with google and github, Reference [Santri Koding](https://santrikoding.com/login-dengan-google-github-di-laravel-menggunakan-socialite-1-installasi-persiapan)

## features
- register with google
- login with google
- register with github
- login with github

## requirements
- php 8.1.2
- database mysql
- laravel 10.0
- laragon
- chrome
- composer

## installation

1. Clone repositori
    ```sh
    git clone https://github.com/fahmyfauzi/laravel-socialite
    ```
2. masuk ke dalam directori
    ```sh
    cd laravel-socialite
    ```
3. Instal composer
    ```sh
    composer install
    ```
    
4. Generate an app encryption key

    ```sh
    php artisan key:generate
    ```
5. migrasi database
    ```
    php artisan migrate
    ```
6. Add Oauth Github and google
    ```
    GOOGLE_CLIENT_ID= YourClientIDGoogle
    GOOGLE_CLIENT_SECRET= YourSecretGoogle
    GOOGLE_CLIENT_REDIRECT=http://localhost:8000/auth/google/callback
    
    GITHUB_CLIENT_ID=YourClientIDGithub
    GITHUB_CLIENT_SECRET=YourSecretGithub
    GITHUB_CLIENT_REDIRECT=http://localhost:8000/auth/github/callback
    ```
    
7. jalankan project

    ```sh
     php artisan serve
    ```


## usage
- jalankan laragon
- akses untuk register ```http://127.0.0.1:8000/register```
- akses untuk login ```http://127.0.0.1:8000/login```
- klik button ``` Register Github ``` atau ```Register Google```
- klik button  ``` Login Github ``` atau ```Login Google```

## credits

[Fahmy Fauzi ](https://github.com/fahmyfauzi)

## screanshot
1. Register
![socialite2](https://github.com/fahmyfauzi/laravel-socialite/assets/58255031/01db30ff-e513-4a81-852b-7454ebfa1951)

2. Login
![socialite1](https://github.com/fahmyfauzi/laravel-socialite/assets/58255031/81340efc-47c1-4f5c-82b7-6da9d47a1808)
