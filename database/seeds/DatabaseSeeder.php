<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('articles')->truncate();
        DB::table('questions')->truncate();
        $this->call(QuestionTableSeeder::class);
        $this->call(ArticleTableSeeder::class);

        Model::reguard();
    }
}
