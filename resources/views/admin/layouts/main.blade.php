<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  @vite('resources/css/app.css')
</head>
<body> 

  <div class="flex">
    @include('admin.layouts.sidebar')

    <main class="grow bg-gray-100 p-4">
      @yield('container')
    </main>
  </div>


</body>
</html>