<div class="min-h-screen w-60 p-4 bg-gray-900 text-gray-300">
  <div class="flex items-center justify-between p-2 ">
    <div class="flex items-center gap-4">
      <img class="w-10" src="{{ asset('assets/profile.png') }}" alt="">
      <p class="text-sm">Zeyd Ali</p>
    </div>
    <i class="fa-solid fa-chevron-down"></i>
  </div>

  <div class="mt-3">
    <div class="{{ Request::is('/') ? 'bg-gray-800 text-green-800' : '' }} rounded-md">
      <a class="flex items-center text-sm p-3 gap-3" href="/">
        <i class="fa-solid fa-chart-pie text-center w-7"></i>
        Dashboard
      </a>
    </div>

    <ul class="mt-5">
      <li class="text-sm text-green-800 font-bold mb-2">Admin</li>
      <li class="{{ Request::is('posts') ? 'bg-gray-800 text-green-800' : '' }} rounded-md">
        <a class="flex items-center text-sm p-3 gap-3" href="/posts">
          <i class="fa-solid fa-file-lines text-center w-7"></i>
          Posts
        </a>
      </li>
      <li class="{{ Request::is('shows') ? 'bg-gray-800 text-green-800' : '' }} rounded-md">
        <a class="flex items-center text-sm p-3 gap-3" href="/shows">
          <i class="fa-solid fa-film text-center w-7"></i>
          Movies & Series
        </a>
      </li>
      <li class="{{ Request::is('users') ? 'bg-gray-800 text-green-800' : '' }} rounded-md">
        <a class="flex items-center text-sm p-3 gap-3" href="/users">
          <i class="fa-solid fa-users text-center w-7"></i>
          Users
        </a>
      </li>
    </ul>
  </div>

  <div class="absolute inset-x-4 bottom-10">
    <div class="rounded-md">
      <a class="flex items-center p-3 gap-3" href="">
        <i class="fa-solid fa-right-from-bracket text-center w-7"></i>
        Logout
      </a>
    </div>
  </div>
</div>