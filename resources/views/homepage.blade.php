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
  

  

  <div>
    <div class="bg-blue-500 h-72 flex justify-center items-center flex-col gap-4 w-full">
      <h1 class="text-5xl">Investkan</h1>
      <h1 class="text-3xl">A leading fintech company in Indonesia</h1>
      <a href="#"><h1 class="text-xl p-2 rounded-md outline outline-blue-700 bg-blue-600">Get started !</h1></a>
    </div>
  </div>


  <div class="mt-16">
    <h1 class="flex justify-center text-4xl">Category</h1>
    <div class="flex justify-center items-center mt-10">
      <div class="grid grid-cols-3 gap-x-12 gap-y-24">
        <div class="flex grow h-96 w-30rem rounded-md outline outline-4 outline-gray-300">
          <img src="{{ url('images/fnb.jpg')}}" alt="" class="rounded brightness-50">
          <div class="absolute ">
            <a href=""><h1 class="text-4xl text-white mt-40 ml-16">Food and Beverages</h1></a>
          </div>
        </div>
        <div class="flex grow h-96 w-30rem rounded-md outline outline-4 outline-gray-300">
          <img src="{{ url('images/tech.jpeg')}}" alt="" class=" rounded brightness-50">
          <div class="absolute ">
            <a href=""><h1 class="text-4xl text-white mt-40 ml-32">Technology</h1></a>
          </div>
        </div>
        <div class="flex grow h-96 w-30rem rounded-md outline outline-4 outline-gray-300">
          <img src="{{ url('images/baju.jpeg')}}" alt="" class="rounded brightness-50">
          <div class="absolute">
            <a href=""><h1 class="text-4xl text-white mt-40 ml-32">Clothing store</h1></a>
          </div>
        </div>
        <div class="flex grow h-96 w-30rem rounded-md outline outline-4 outline-gray-300">
          <img src="{{ url('images/tani.jpeg')}}" alt="" class="rounded brightness-50">
          <div class="absolute">
            <a href=""><h1 class="text-4xl text-white mt-40 ml-32">Agriculture</h1></a>
          </div>
        </div>
        <div class="flex grow h-96 w-30rem rounded-md outline outline-4 outline-gray-300">
          <img src="{{ url('images/bimbel.jpeg')}}" alt="" class="rounded brightness-50">
          <div class="absolute">
            <a href=""><h1 class="text-4xl text-white mt-40 ml-32">Education</h1></a>
          </div>
        </div>
        <div class="flex grow h-96 w-30rem rounded-md outline outline-4 outline-gray-300">
          <img src="{{ url('images/mebel.jpg')}}" alt="" class="rounded brightness-50">
          <div class="absolute">
            <a href=""><h1 class="text-4xl text-white mt-40 ml-40">Furniture</h1></a>
          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="flex justify-center mt-20">
    <div class="bg-blue-500 w-88.5% h-96 rounded-md">
      <h1 class="text-2xl p-5">Ini bagian saham paling trending</h1>
    </div>
  </div>

  <div id="about-us">
  </div>

  <div class="flex justify-center bg-blue-500 w-full h-72 mt-32">
    <div class="flex flex-col items-center gap-y-8 mt-5">
      <h1 class="text-4xl">About Us</h1>
      <h1 class="text-2xl w-10/12">Investkan adalah perusahaan yang bergerak dalam bidang finansial dan technology. Kami berkomitmen untuk memajukan ekonomi lokal dengan menghubungkan pemilik usaha mikro, kecil, dan menengah (UMKM) dengan para investor yang siap memberikan dukungan finansial. Kami percaya bahwa setiap UMKM memiliki potensi besar untuk berkembang dan memberikan dampak positif bagi komunitas sekitarnya. </h1>
    </div>
  </div>

  <div id="services">

  </div>

  <div class="mt-32">
    <h1 class="text-5xl flex justify-center">Kenapa pilih kami?</h1>
    <div class="flex justify-center items-center">
      <div class="grid grid-cols-3 gap-x-14 mt-10">
        <div class="flex bg-blue-500 h-96 w-96 rounded-md">
            <?xml version="1.0" encoding="UTF-8"?>
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="blue" class="mt-5 ml-5 w-20 h-20">
            <path d="m23.126,9.868h0l-2.151-2.154v-1.718c0-1.651-1.342-2.995-2.991-2.995h-1.716l-2.151-2.153c-1.131-1.131-3.101-1.131-4.231,0l-2.151,2.153h-1.716c-1.65,0-2.991,1.343-2.991,2.995v1.718l-2.152,2.154c-1.165,1.168-1.165,3.067,0,4.235l2.151,2.154v1.718c0,1.651,1.342,2.995,2.991,2.995h1.716l2.151,2.153c.565.565,1.317.877,2.116.877s1.55-.312,2.115-.877l2.151-2.153h1.716c1.65,0,2.991-1.343,2.991-2.995v-1.718l2.152-2.154c1.165-1.168,1.165-3.067,0-4.235Zm-4.922.343l-5.054,4.995c-.614.61-1.423.916-2.231.916s-1.613-.305-2.229-.913l-2.599-2.499c-.392-.389-.396-1.021-.007-1.414.39-.391,1.021-.396,1.415-.007l2.598,2.498c.453.449,1.19.45,1.644,0l5.055-4.996c.394-.39,1.026-.386,1.415.007s.385,1.025-.007,1.414Z"/>
            </svg>
            <div class="p-5">
              <h1 class="text-4xl mt-2">Trusted</h1>
              <h1 class="text-lg mt-2">Kami menjamin bahwa data anda akan aman</h1>
            </div>
        </div>
        <div class="flex bg-blue-500 h-96 w-96 rounded-md">
          <?xml version="1.0" encoding="UTF-8"?>
          <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="blue" class="mt-5 ml-5 w-20 h-20">
          <path d="m23.126,9.868h0l-2.151-2.154v-1.718c0-1.651-1.342-2.995-2.991-2.995h-1.716l-2.151-2.153c-1.131-1.131-3.101-1.131-4.231,0l-2.151,2.153h-1.716c-1.65,0-2.991,1.343-2.991,2.995v1.718l-2.152,2.154c-1.165,1.168-1.165,3.067,0,4.235l2.151,2.154v1.718c0,1.651,1.342,2.995,2.991,2.995h1.716l2.151,2.153c.565.565,1.317.877,2.116.877s1.55-.312,2.115-.877l2.151-2.153h1.716c1.65,0,2.991-1.343,2.991-2.995v-1.718l2.152-2.154c1.165-1.168,1.165-3.067,0-4.235Zm-4.922.343l-5.054,4.995c-.614.61-1.423.916-2.231.916s-1.613-.305-2.229-.913l-2.599-2.499c-.392-.389-.396-1.021-.007-1.414.39-.391,1.021-.396,1.415-.007l2.598,2.498c.453.449,1.19.45,1.644,0l5.055-4.996c.394-.39,1.026-.386,1.415.007s.385,1.025-.007,1.414Z"/>
          </svg>
          <div class="p-5">
            <h1 class="text-4xl mt-2">Trusted</h1>
            <h1 class="text-lg mt-2">Kami menjamin bahwa data anda akan aman</h1>
          </div>
      </div>
      <div class="flex bg-blue-500 h-96 w-96 rounded-md">
        <?xml version="1.0" encoding="UTF-8"?>
        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill="blue" class="mt-5 ml-5 w-20 h-20">
        <path d="m23.126,9.868h0l-2.151-2.154v-1.718c0-1.651-1.342-2.995-2.991-2.995h-1.716l-2.151-2.153c-1.131-1.131-3.101-1.131-4.231,0l-2.151,2.153h-1.716c-1.65,0-2.991,1.343-2.991,2.995v1.718l-2.152,2.154c-1.165,1.168-1.165,3.067,0,4.235l2.151,2.154v1.718c0,1.651,1.342,2.995,2.991,2.995h1.716l2.151,2.153c.565.565,1.317.877,2.116.877s1.55-.312,2.115-.877l2.151-2.153h1.716c1.65,0,2.991-1.343,2.991-2.995v-1.718l2.152-2.154c1.165-1.168,1.165-3.067,0-4.235Zm-4.922.343l-5.054,4.995c-.614.61-1.423.916-2.231.916s-1.613-.305-2.229-.913l-2.599-2.499c-.392-.389-.396-1.021-.007-1.414.39-.391,1.021-.396,1.415-.007l2.598,2.498c.453.449,1.19.45,1.644,0l5.055-4.996c.394-.39,1.026-.386,1.415.007s.385,1.025-.007,1.414Z"/>
        </svg>
        <div class="p-5">
          <h1 class="text-4xl mt-2">Trusted</h1>
          <h1 class="text-lg mt-2">Kami menjamin bahwa data anda akan aman</h1>
        </div>
    </div>
      </div>
    </div>
  </div>


  <div class="mt-28 flex justify-start">
    <div class="flex flex-col w-80 gap-y-5 ml-32">
      <h1 class="text-5xl">FAQ</h1>
      <h1 class="text-xl">1. Apakah aman invest di Investkan?</h1>
      <h1 class="text-xl">2. Bagaimana cara investasi di Investkan?</h1>
      <h1 class="text-xl">3. Apakah Investkan sudah dapat izin?</h1>
    </div>
    <img src="images/perusahaan.webp" alt="" class="rounded-lg w-1/2 ml-44 h-120">
  </div>


  <div class="flex justify-center mt-28 bg-blue-400">
    <img src="{{ url('images/logo.png')}}" alt="" class="mr-auto scale-50">
    <div class="flex mr-auto gap-x-36">
      <div class="flex flex-col mt-14 gap-y-1.5">
        <h1 class="text-sm text-white">Services</h1>
        <h1 class="text-sm">Buy stocks</h1>
        <h1 class="text-sm">Sell stocks</h1>
        <h1 class="text-sm">Chatting</h1>
      </div>
      <div class="flex flex-col mt-14 gap-y-1.5">
      <h1 class="text-sm text-white">Services</h1>
      <h1 class="text-sm">Buy stocks</h1>
      <h1 class="text-sm">Sell stocks</h1>
      <h1 class="text-sm">Chatting</h1>
    </div>
    <div class="flex flex-col mt-14 gap-y-1.5">
      <h1 class="text-sm text-white">Services</h1>
      <h1 class="text-sm">Buy stocks</h1>
      <h1 class="text-sm">Sell stocks</h1>
      <h1 class="text-sm">Chatting</h1>
    </div>
    <div class="flex flex-col mt-14 gap-y-1.5">
      <h1 class="text-sm text-white">Services</h1>
      <h1 class="text-sm">Buy stocks</h1>
      <h1 class="text-sm">Sell stocks</h1>
      <h1 class="text-sm">Chatting</h1>
    </div>
    </div>
</body>
</html>