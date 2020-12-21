<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([         
            'correo' => 'esge@unjbg.edu.pe',
            'nombre' => 'Administrador',
            'password' => Hash::make('adminesge'),
            'habilitado' => 1,
        ]);

        $this->command->info('Datos iniciales generados correctamente');//
    }
}