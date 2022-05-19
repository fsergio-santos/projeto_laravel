<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $registro)
    {
        $registro->create([
            'name' => 'Antonio Carlos',
            'email' => 'antonio.carlos@email.com',
            'sexo' => 'M',
            'profile_pic' => 'boy.png',
            'password' => Hash::make('123456'),
        ]);
    }
}
