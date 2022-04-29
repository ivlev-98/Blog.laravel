<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index(User $user)
    {   
        $user = $user->withCount('posts')->withCount('comments')->find(Auth::user()->id);
        return view('home.index', compact('user'));
    }
}
