<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Service\User::class)->create([
        	'name' => 'Toolcelular',
        	'email' => 'toolcelular@gmail.com',
        	'password' => 'secret',
        	'path' => 'uploads/Toolcelular.png',
        	'description' => 'M&aacute;s que un servicio t&eacute;cnico'
        ]);
    }
}
