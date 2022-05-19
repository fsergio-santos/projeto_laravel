<?php

use Illuminate\Database\Seeder;
use App\Author;
use Carbon\Carbon;

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
