<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name = "Pedro Teste";
        $u->email = "admin@email.com";
        $u->password = bcrypt("123");
        $u->save();
    }
}
