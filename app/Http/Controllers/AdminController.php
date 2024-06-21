<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Hash;

class AdminController extends Controller
{
  public function index()
{
    $client = new \GuzzleHttp\Client();
    $data = null;
    $data1 = null;

    try {
        $response = $client->get('http://localhost:8080/getAllDataOwner');
        $response1 = $client->get('http://localhost:8080/getAllDataInvestor');
        $statusCode = $response1->getStatusCode();
        $statusCode1 = $response->getStatusCode();

        if ($statusCode !== 200 || $statusCode1 !== 200) {
            echo "Error: Received status code $statusCode";
            return;
        }

        $data = json_decode($response->getBody(), true);
        $data1 = json_decode($response1->getBody(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "Error decoding JSON: " . json_last_error_msg();
            return;
        }

        // if ($data === null) {
        //     echo "Error: No data received";
        //     return;
        // }

        // foreach ($data as $userData) {
        //     echo $userData['username'] . "<br>";
        //     echo $userData['email'] . "<br>";
        // }

    } catch (\Exception $e) {
        echo "Request failed: " . $e->getMessage();
    }
    return view('dashboard', ['data' => $data]);
}

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $response = Http::post('http://localhost:8080/loginInvestor', [
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
        return view('loginAdmin');
    }

    public function showRegistration(){
        return view('registerAdmin');
    }

   public function registration(Request $request){
       $username = $request->input('username');
       $email = $request->input('email');
       $phonenumber = $request->input('phonenumber');
       $description = $request->input('description');
       $password = $request->input('password');

       $response = Http::post('http://localhost:8080/sendAllDataInvestor', [
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

   public function showUpdateOwner($id){
    $client = new \GuzzleHttp\Client();
    $response = $client->get('http://localhost:8080/getAllDataOwnerById/' . $id);
    $responseData = json_decode($response->getBody()->getContents(), true);
    return view('updateData', ['data' => $responseData]);
    }

    public function updateOwner(Request $request,$id){
      $username = $request->input('username');
      $email = $request->input('email');
      $phonenumber = $request->input('phonenumber');
      $description = $request->input('description');
      $client = new \GuzzleHttp\Client();
      $response = $client->put('http://localhost:8080/updateDataOwner/' . $id, [
          'json' => [
              'username' => $username,
              'email' => $email,
              'description' => $description,
              'password' => Hash::make($password),
          ],
      ]);
  
      if ($response->getStatusCode() == 200) {
          return redirect('homepage')->with('success','Data berhasil diupdate');
      } else {
          return redirect('homepage')->with('failed','Data tidak berhasil diupdate');
      }
  }

    public function showUpdateInvestor($id){
      $client = new \GuzzleHttp\Client();
      $response = $client->get('http://localhost:8080/getAllDataInvestorById/' . $id);
      $responseData = json_decode($response->getBody()->getContents(), true);
      return view('updateData', ['data' => $responseData]);
      }

    public function updateInvestor(Request $request,$id){
      $username = $request->input('username');
      $email = $request->input('email');
      $phonenumber = $request->input('phonenumber');
      $description = $request->input('description');
      $client = new \GuzzleHttp\Client();
      $response = $client->put('http://localhost:8080/updateDataInvestor/' . $id, [
          'json' => [
              'username' => $username,
              'email' => $email,
              'description' => $description,
              'password' => Hash::make($password),
          ],
      ]);
  
      if ($response->getStatusCode() == 200) {
          return redirect('homepage')->with('success','Data berhasil diupdate');
      } else {
          return redirect('homepage')->with('failed','Data tidak berhasil diupdate');
      }
  }
  
  public function deleteOwner($id){
      $client = new \GuzzleHttp\Client();
      $response = $client->delete('http://localhost:8080/deleteDataOwner/' . $id);
      if ($response->getStatusCode() == 200) {
          return redirect('homepage')->with('success','Data berhasil didelete');
      } else {
          return redirect('homepage')->with('failed','Data tidak berhasil didelete');
      }
  }
  
  public function deleteInvestor($id){
    $client = new \GuzzleHttp\Client();
    $response = $client->delete('http://localhost:8080/deleteDataInvestor/' . $id);
    if ($response->getStatusCode() == 200) {
        return redirect('homepage')->with('success','Data berhasil didelete');
    } else {
        return redirect('homepage')->with('failed','Data tidak berhasil didelete');
    }
}
}
