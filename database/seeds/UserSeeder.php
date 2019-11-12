<?php
use App\Profession as pro;
use App\User as us;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pro= pro::where('title','desarrollador front-end')->value('id');
    	//tambien se puede usar esta forma laravel entiende que title es el nombre de la columna
    	//$pro= DB::table('Profession')->whereTitle('desarrollador front-end')->value('id');
    	
    	us::create([
    		'name'=>'Edilberto Herrera',
        	'email'=>'edilbertoh7@gmail.com',
        	'password'=> bcrypt('141580'),
        	'Profession_id'=>$pro

    	]);
      
        	$pro=  pro::where('title','=','desarrollador back-end')->value('id');
    
         us::create([

        	'name'=>'Ashley Valentina Herrera',
        	'email'=>'ashleyvalenet261205@gmail.com',
        	'password'=> bcrypt('141580'),
        	'Profession_id'=>$pro
        	
        ]);
    }
}
