<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("pt_BR");
        foreach( range(1, 50) as $i)
        {
            Cliente::create([
                'nome' => $faker->name,
                'cpf' => $faker->cpf(false),
                'email' => $faker->companyEmail,
                'telefone' => "({$faker->areaCode}) $faker->landline",
                'celular' => $faker->cellphoneNumber,
                'perfil' => $faker->randomDigit
            ]);
        }
    }
}
