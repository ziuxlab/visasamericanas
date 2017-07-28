<?php
    
    /*
    |--------------------------------------------------------------------------
    | Model Factories
    |--------------------------------------------------------------------------
    |
    | Here you may define all of your model factories. Model factories give
    | you a convenient way to create models for testing and seeding your
    | database. Just tell the factory how a default model should look.
    |
    */
    
    /** @var \Illuminate\Database\Eloquent\Factory $factory */
    $factory->define(App\User::class, function (Faker\Generator $faker) {
        static $password;
        
        return [
            'telefono' => $faker->phoneNumber,
            'nombre'   => $faker->name,
            'user_id'  => 1
        ];
    });
    
    $factory->defineAs(App\User::class, 'pruebas', function (Faker\Generator $faker) {
        static $password;
        
        return [
            'telefono' => $faker->phoneNumber,
            'nombre'   => $faker->name,
            'user_id'  => 2
        ];
    });
