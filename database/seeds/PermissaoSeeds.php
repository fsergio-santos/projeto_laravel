<?php

use App\Permissao;
use Illuminate\Database\Seeder;

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Permissao::class, 20)->create();
    }
}
