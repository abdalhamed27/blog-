<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class tegTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tegs')->insert([
'teg'=>'jave',
'created_at'=>Carbon::now(),
'updated_at'=>Carbon::now()

        ]);DB::table('tegs')->insert([
'teg'=>'laravel',
'created_at'=>Carbon::now(),
'updated_at'=>Carbon::now()

        ]);
        DB::table('tegs')->insert([
'teg'=>'php',
'created_at'=>Carbon::now(),
'updated_at'=>Carbon::now()

        ]);
    }
}
