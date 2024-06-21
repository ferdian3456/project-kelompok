<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite('public/css/style.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="font-[Poppins] font-medium">
  <div id="navbar container" class="bg-blue-400 flex items-center pl-10 pr-10 w-full">
    <img src="{{ url('images/logo.png')}}" alt="Logo" class="w-24 scale-50 mr-auto">
    <div class="flex gap-5 items-center mr-auto">
      <a href="#about-us"><h1 class="text-lg">About Us</h1></a>
      <a href="#services"><h1 class="text-lg">Services</h1></a>
      <a href="{{ url('stocks') }}"><h1 class="text-lg">Stocks</h1></a>
      <a href="{{ url('chat') }}"><h1 class="text-lg">Chat</h1></a>
    </div>
    <div class="flex gap-5">
      <a href="{{ url('ChooseLogin')}}"><h1 class="text-lg">Login</h1></a>
      <a href="{{ url('ChooseRegister')}}"><h1 class="text-lg">Register</h1></a>
    </div>
  </div>

  @if($message=Session::get('failed'))
  <div id="popup-container" class="flex justify-center items-center fixed top-0 left-0 w-full h-screen bg-black/50">
    <div id="popup" class="bg-white p-4 rounded-lg shadow-md w-1/2 mx-auto">
      <h1 id="popup-message" class="text-2xl font-bold">{{ $message }}</h1>
    </div>
  </div>
  <script>
    setTimeout(function() {
      document.getElementById('popup-container').style.display = 'none';
    }, 2000);
  </script>
@endif
@if($message=Session::get('Success'))
<div id="popup-container" class="flex justify-center items-center fixed top-0 left-0 w-full h-screen bg-black/50">
  <div id="popup" class="bg-white p-4 rounded-lg shadow-md w-1/2 mx-auto">
    <h1 id="popup-message" class="text-2xl font-bold">{{ $message }}</h1>
  </div>
</div>
<script>
  setTimeout(function() {
    document.getElementById('popup-container').style.display = 'none';
  }, 2000);
</script>
@endif
  <div class="w-screen mt-10 ">
    <h1 class="flex justify-center text-3xl">Owner</h1>
  <div class="flex justify-center mt-10 gap-x-56">
    <h1 class="text-2xl">#</h1>
    <h1 class="text-2xl">Username</h1>
    <h1 class="text-2xl">Email</h1>
    <h1 class="text-2xl">Action</h1>
  </div>
  <div class="flex grid-rows-3 justify-center mt-2 gap-x-48">
    @foreach ($data as $item)
    <h1 class="text-2xl">{{ $item['id'] }}</h1>
    <h1 class="text-2xl">{{ $item['username'] }}</h1>
    <h1 class="text-2xl">{{ $item['email'] }}</h1>
    @endforeach
  </div>

  <div class="w-screen mt-10 ">
    <h1 class="flex justify-center text-3xl">Investor</h1>
  <div class="flex justify-center mt-10 gap-x-56">
    <h1 class="text-2xl">#</h1>
    <h1 class="text-2xl">Username</h1>
    <h1 class="text-2xl">Email</h1>
    <h1 class="text-2xl">Action</h1>
    <a href=""><h1 class="text-xl">View Data</h1></a>
    <a href=""><h1 class="text-xl">Update Data</h1></a>
    <a href=""><h1 class="text-xl">Delete data</h1></a>
  </div>

  <div class="flex justify-center mt-2 gap-x-48">
    {{-- <h1 class="text-2xl">{{ $item->id</h1>
    <h1 class="text-2xl">{{ $item->username</h1>
    <h1 class="text-2xl">{{ $item->email</h1>
  </div>
  </div>
</body>
</html>