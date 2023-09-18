<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  @vite('resources/css/app.css')
</head>
<body class="font-sans"> 
  <div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col gap-8 items-center border p-8 rounded-md">
      <h1 class="text-lg font-medium">Welcome Back!</h1>
      @if(session()->has('loginError'))
        <div id="alert" class="bg-red-100 text-red-500 border border-red-400 rounded-md p-2.5 w-full relative" role="alert">
          <strong>Oops,</strong>
          <span>{{ session('loginError') }}</span>
          <i id="alertClose" class="fa-solid fa-xmark absolute top-0 bottom-0 right-0 px-3 py-3.5" role="button"></i>
        </div>
      @endif
      <form action="/login" method="post">
        @csrf
        <div class="flex flex-col gap-3 w-72">
          <div>
            <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:outline-offset-4" placeholder="name@gmail.com" required autocomplete="off" value="{{ old('email') }}">
            @error('email')
              <div class="text-red-400">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div>
            <input type="password" name="password" id="password" class="border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:outline-offset-4" placeholder="Password" required autocomplete="off">
          </div>
          <div>
            <button type="submit" class="group relative p-2 w-full overflow-hidden rounded-lg bg-white text-lg mt-4 border border-gray-500">
              <div class="absolute inset-0 w-3 bg-gray-900 transition-all duration-[400ms] ease-out group-hover:w-full"></div>
              <span class="relative text-black group-hover:text-white">Sign In</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    const closeButton = document.getElementById('alertClose');
  
    const alertDiv = document.getElementById('alert');
  
    closeButton.addEventListener('click', () => {
      alertDiv.style.display = 'none';
    });
  </script>
</body>
</html>