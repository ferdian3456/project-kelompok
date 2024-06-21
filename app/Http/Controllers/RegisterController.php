<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Hash;

class RegisterController extends Controller
{
    public function showRegisterChoose(){
      return view('registerchoose');
    }
}
