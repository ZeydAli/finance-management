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
<body> 
  <div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col gap-8 items-center border p-8 rounded-md">
      <h1 class="text-lg font-medium">Welcome Back!</h1>
      <div class="flex flex-col gap-3 w-72">
        <div>
          <input type="text" name="username" id="username" class="border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 focus:outline-offset-4" placeholder="name@gmail.com" required autocomplete="off">
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
    </div>
  </div>
</body>
</html>