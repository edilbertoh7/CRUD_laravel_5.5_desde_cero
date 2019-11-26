<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
	public function index()
	{
		
		$users =User::all();
        
	$title='listado de usuarios';
     	return view('users.index',compact('users','title'));
/*forma alternativa de llamar a la vista*/
 // return view('users')->with('users',User::all())->with('title','listado de usuarios');
    		
    }

    public function show(User $user)
    // recibo $user como argumento desde el archivo web.php
    //asi evito usar el metodo findOrFail
    {
        //$user=User::findOrFail($id);
        //si solo usamos el metodo fin seria util usar la siguiente condicion de lo contrario no 

        // if ($user == null) {

        //      return response()->view('errors.404', [], 404);
        // }
       
    	return view('users.show',compact('user'));
    }

    public function create()
    {
    	return view('users.create');
    }

    
    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'email'=>['required','email','unique:users,email'],
            'password'=>'required',
        ],['name.required'=>'El campo nombre es obligatorio'
    ]);

        User::create([
             'name' => $data['name'],
             'email' =>$data['email'],
             'password' => bcrypt($data['password'])
        ]);
        return redirect()->route('users');
    }

    public function edit(User $user)
    {
        return view('users.edit',['user'=>$user]);
    }

    public function update(User $user)
    {
       $data = request()->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users,email,'.$user->id,
        'password'=>'',
       ]);
       if ($data['password']!=null) {
           $data['password']=bcrypt($data['password']);
       }else{
        unset($data['password']); 
       }
       $user->update($data);
        return redirect()->route('users.show',['user'=>$user]);
    }

    public function destroy(User $user)
    {
        $user->delete();
       return redirect()->route('users');
    }

}
