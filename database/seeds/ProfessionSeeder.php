<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { //desactiva la revision de llaves foranes temporalmente
    	// DB::statement('SET FOREIGN_KEY_CKECKS = 0;');
    	// //vacia la tabla antes de ejecutar la migracion
    	// DB::table('profession')->truncate();
    	// DB::statement('SET FOREIGN_KEY_CKECKS = 1;');

        DB::table('profession')->insert([
        	'title'=>'desarrollador back-end',
        ]);

          DB::table('profession')->insert([
        	'title'=>'desarrollador front-end',
        ]);

            DB::table('profession')->insert([
        	'title'=>'desarrollador diseñador web',
        ]);

              DB::table('profession')->insert([
        	'title'=>'desarrollador arquitecto de software',
        ]);
    }
}
