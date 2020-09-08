<?php

use App\Author;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class AuthorSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Author $registro)
    {
        factory(Author::class, 50)->create();
    }
}
