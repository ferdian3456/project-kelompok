<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite('public/css/style.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="font-[Poppins] font-medium">
  <div class="flex justify-center items-center w-screen h-screen">
    <div class="w-1/2 h-1/2 shadow-2xl rounded-lg bg-blue-500">
      <div class="flex justify-between mt-36 p-10">
        <div class="flex justify-center items-center">
          <a href="{{ url('LoginInvestor')}}"><h1 class="text-5xl">Investor</h1></a>
        </div>
        <div>
          <a href="{{ url('LoginAdmin')}}"><h1 class="text-5xl">Admin</h1></a>
        </div>
        <div class="flex justify-center items-center">
          <a href="{{ url('LoginOwner')}}"><h1 class="text-5xl">Owner</h1></a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>