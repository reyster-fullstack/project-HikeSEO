Clone this repository - https://github.com/reyster-fullstack/project-HikeSEO.git

after that copy the .env.example and paste copy rename it .env

open teminal and enter this - npm install laravel-mix --save-dev then press enter

after that open your package.json delete its content and paste this

{
    "private": true,
    "type": "module",
    "scripts": {
        "dev": "npm run development",
        "development": "mix",
        "watch": "mix watch",
        "watch-poll": "mix watch -- --watch-options-poll=1000",
        "hot": "mix watch --hot",
        "prod": "npm run production",
        "production": "mix --production",
        "build": "webpack --config webpack.prod.js"
    },
    "devDependencies": {
        "@popperjs/core": "^2.11.6",
        "@vitejs/plugin-vue": "^4.5.0",
        "@vue/cli-plugin-typescript": "^5.0.8",
        "@vue/compiler-sfc": "^3.2.37",
        "@vue/eslint-config-typescript": "^12.0.0",
        "axios": "^1.6.4",
        "bootstrap": "^5.2.0",
        "laravel-mix": "^6.0.49",
        "laravel-vite-plugin": "^1.0.0",
        "sass": "^1.56.1",
        "typescript": "^5.3.3",
        "vite": "^5.0.0",
        "vue": "^3.4.21",
        "vue-loader": "^17.4.2",
        "webpack": "^5.0.0",
        "webpack-cli": "^4.0.0"
    },
    "dependencies": {
        "v-calendar": "^3.1.2",
        "vue-router": "^4.3.0",
        "vuex": "^4.1.0",
        "webpack": "^5.90.3"
    }
}

create a file name webpack.mix.cjs and then paste this on that file

const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').vue({ version: 3 })
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);


on your terminal enter this npm add vue-loader@^16.2.0 --dev then click enter

on your terminalnpm update vue-loader webpack laravel-mix then enter

go to resources/js/app.js open the file at the very top you will see import './bootstrap';edit that to import './bootstrap.js';

after that open your phpMyAdmin or any database create a database named hikeseo

the on the terminal enter composer install then enter

on the terminal enter php artisan key:generate then enter

on terminal enter php artisan migrate
the php artisan db:seed



