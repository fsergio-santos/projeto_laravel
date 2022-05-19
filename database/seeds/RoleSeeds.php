<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class, 20)->create();
    }
}
