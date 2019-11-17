<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
    	'id' => $faker->andomDigitNotNull,
        'nombre' => $faker->name,
        'apellido' => $faker->name,
        'documento' => rand(000000,999999),
        'cotrato' => rand(0000,9999),
        'tipo_contrato' => rand(array('prestacion de servicios','planta')),
        'genero' => rand(array('M','F')),
        'email' => $faker->unique()->safeEmail,
        'telefono' => '31' . rand(000000),
        'direccion' => $faker->name,
        'inicio_trabajar' => rand(01,31) .'/' . rand(01,12) . '/' rand(2000,2020),
        'numero_cuenta' => rand(000000,999999),
        'sueldo_basico' => $faker->numberBetween($min = 867000, $max=1000000),
        'nota' => $faker->text($tet=100),
        'archivos' => "no hay",
        'clave_huella' => "huella"


    ];
});
