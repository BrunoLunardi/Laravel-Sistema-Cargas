## Criação do projeto

composer create-project laravel/laravel Sistema-Cargas

## Subir servidor local

php artisan serve

## Criação de Models e Migrations

php artisan make:model NomeDaModel --migration

## Criar um controller

php artisan make:controller NomeDaControlller

## Configuração do Banco de Dados

Arquivos .env (raiz do projeto - usado para teste local) e /config/database.php

## Nome do BD

cursolaravel55_saldo

## Instalação Easy AdminLTE integration with Laravel 5

https://github.com/jeroennoten/Laravel-AdminLTE

composer require jeroennoten/laravel-adminlte

## Assets do Easy AdminLTE

php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets

## Seeds

php artisan make:seed nome_seed

Após popuar o seeder navegue em database/seeds/DatabaseSeeder.php e coloque a chamada para o seeder que você criou.

Exemplo: $this->call(UsersTableSeeder::class);

Para executar o Seed:

php artisan db:seed

## Criar tela de login com AdminLTE

php artisan make:adminlte (semelhante ao make:auth)

## Criar arquivo de configuração do AdminLTE (para titulo das paginas, menu, etc.)

php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=config

Este arquivo estará em config/adminlte.php

## Tradução da página

https://github.com/caouecs/Laravel-lang

Altere o nome da pasta para pt-br e copie ela para resources/lang

Altere as seguintes linhas do arquivo config/app.php

'locale' => 'pt-br',

'fallback_locale' => 'pt-br',

Após a instalação do pacote, pode exportar as configurações de idioma pelo comando:

php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=translations

A configuração pode ser acessado em:

resources/lang/vendor/adminlte

## Customizando views 

Para gerar um arquivo de configurações da view o comando é:

php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=views

O arquivo será criado em:

resources/views/vendor/adminlte


## Recriar as migrations e executar seeds

php artisan migrate:refresh --seed


## Criar request (validação)

php artisan make:request nome_request








<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
