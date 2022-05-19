<?php
use App\Editora;
use Illuminate\Database\Seeder;

class EditoraSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Editora::class, 20)->create();
    }
}
