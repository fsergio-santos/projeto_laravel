<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(AuthorSeeds::class);
       // $this->call(EditoraSeeds::class);
       // $this->call(RoleSeeds::class);
       // $this->call(PermissaoSeeds::class);
       $this->call(UserSeeds::class);
    }
}
