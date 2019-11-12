<?php
use App\Profession as pro;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
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

    	pro::create(['title'=>'desarrollador back-end',]);
    	pro::create(['title'=>'desarrollador front-end',]);
    	pro::create(['title'=>'desarrollador diseñador web',]);
    	pro::create(['title'=>'desarrollador arquitecto de software',]);
        

        
    }
}
