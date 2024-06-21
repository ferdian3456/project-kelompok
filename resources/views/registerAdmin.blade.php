<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  @vite('public/css/style.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="font-[Poppins] font-medium">
  <div class="flex justify-center items-center w-screen h-screen">
    <div class="flex w-1/2 h-70% shadow-2xl rounded-lg">
      <div class="rounded-lg">
      <div class="ml-16 mt-16">
        <h1 class="text-4xl text-blue-500 font-medium">Register</h1>
        <h1 class="text-2xl mt-5 text-blue-500 font-medium">Please register to continue</h1>
        <div>
          <form action="{{ url('registerAdmin') }}" method="POST" class="mt-2 mr-5 rounded-lg ">
            @csrf
            <div>
              <input type="text" placeholder="Username" name="username" class="w-96 h-12 pl-3 mt-3 rounded outline outline-1 outline-gray-500">
            </div>
            <div>
              <input type="text" placeholder="Email" name="email" class="w-96 h-12 pl-3 mt-6 tex rounded outline outline-1 outline-gray-500">
            </div>
            <div>
              <input type="number" placeholder="Phonenumber" name="phonenumber" class="w-96 h-12 pl-3 mt-6 tex rounded outline outline-1 outline-gray-500">
            </div>
            <div>
              <input type="text" placeholder="Description" name="description" class="w-96 h-12 pl-3 mt-6 tex rounded outline outline-1 outline-gray-500">
            </div>
            <div>
              <input type="text" placeholder="Password" name="password" class="w-96 h-12 pl-3 mt-6 rounded outline outline-1 outline-gray-500">
            </div>
            <span><a href="#"><h1 class="text-blue-500 mt-3">Forgot password?</h1></a></span>
            <div>
              <button type="submit" class="mt-8 w-96 h-12 font-bold text-white outline outline-1 rounded bg-blue-500">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="ml-2 bg-blue-600 flex flex-col grow rounded-xl shadow-2xl">
      <h1 class="text-white mr-10 mt-10 ml-16 text-5xl">Investkan</h1>
      
      {{-- <img src="{{url('images/logo.png')}}" alt="" class="absolute scale-75 ml-12 mt-36"> --}}
    </div>
  </div>
  </div>
</body>
</html>