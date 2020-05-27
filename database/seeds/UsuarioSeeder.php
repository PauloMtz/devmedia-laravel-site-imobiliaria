<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * para rodar todas as seeders: php artisan db:seed
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', '=', 'admin@email.com')->count()) {
            $usuario = User::where('email', '=', 'admin@email.com')->first();

            $usuario->name = "Pedro Teste";
            $usuario->email = "admin@email.com";
            $usuario->password = bcrypt("123");
            $usuario->save();
        } else {
            $usuario = new User();
            $usuario->name = "Pedro Teste";
            $usuario->email = "admin@email.com";
            $usuario->password = bcrypt("123");
            $usuario->save();
        }
    }
}
