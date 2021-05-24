<?php

use Illuminate\Database\Seeder;
use App\Business;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name'=>'Nombre de la Empresa',
            'description'=>'Descripción Corta de la Empresa',
            'logo'=>'logo.png',
            'email'=>'ejemplo@mail.com',
            'address'=>'Dirección, Calle, San Cristobal, Venezuela',
            'rif_number'=>'1234567890',
        ]);
    }
}
