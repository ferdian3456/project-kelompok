<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Http;
use Hash;

class OwnerController extends Controller
{
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $response = Http::post('http://localhost:8080/loginOwner', [
            'username' => $username,
            // 'password' =>Hash::make($password),
            'password' => $password,
        ]);
        if (!$response->successful()) {
            $errors = $response->json();
            return redirect('homepage')->with('failed','Data yang anda masukkan salah');
        }
        else {
            return redirect('homepage')->with('Success','Selamat anda telah login');
        }
    }

    public function showLogin(){
        return view('loginOwner');
    }

    public function showRegistration(){
        return view('registerOwner');
    }

   public function registration(Request $request){
       $username = $request->input('username');
       $email = $request->input('email');
       $phonenumber = $request->input('phonenumber');
       $description = $request->input('description');
       $password = $request->input('password');

       $response = Http::post('http://localhost:8080/sendAllDataOwner', [
           'username' => $username,
           'email' => $email,
           'phonenumber' => $phonenumber,
           'description' => $description,
        //    'password' =>Hash::make($password),
           'password' => $password,
       ]);
       if (!$response->successful()) {
        $errors = $response->json();
        return redirect('homepage')->with('failed','Data yang anda masukkan salah');
    }
    else {
        return redirect('homepage')->with('Success','Selamat anda telah login');
    }
   }
}
