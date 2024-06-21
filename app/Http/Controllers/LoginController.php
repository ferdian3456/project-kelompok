<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Hash;

class LoginController extends Controller
{
    public function showLoginChoose(){
      return view('loginchoose');
    }
}
