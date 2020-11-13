<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


    public function profile($id){
    	$user=User::findOrFail($id);
    	$posts=$user->post;
    	$posts=Post::paginate(3);
    	return view('profile.index', compact('posts'));
    }
}
