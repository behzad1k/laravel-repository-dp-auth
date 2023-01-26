<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $userRepo;
    public function __construct(UserContract $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \auth()->user();
        return view('dashboard',compact('user'));
    }
}
