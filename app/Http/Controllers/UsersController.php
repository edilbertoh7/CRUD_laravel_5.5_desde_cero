<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function index()
	{
		
		if (request()->has('empty')) {
			$users=[];
		}else{

			$users=['jose','marlon','maria','diego','carlos','saul',

		];
	}
	$title='listado de usuarios';

  //  dd(compact('title','users'));
    	return view('users',compact('title','users'));
    		
    }

    public function show($id)
    {
    	return "mostrando detalle del usuario {$id}";
    }

    public function create()
    {
    	return 'crear nuevo usuario';
    }

}
