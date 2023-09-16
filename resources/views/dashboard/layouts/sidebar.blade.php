<div class="min-h-screen w-60 p-4 bg-gray-900 text-gray-300">
  <div class="rounded-md relative overflow-hidden">
    <input type="checkbox" class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer">
    <div class="flex items-center justify-between p-2">
      <div class="flex items-center gap-4">
        <img class="w-10" src="{{ asset('assets/profile.png') }}" alt="">
        <div>
          <p class="text-sm text-gray-500">Signed in as</p>
          <p class="text-sm">Zeyd Ali</p>
        </div>
      </div>
    </div>

    <div class="absolute top-4 right-3 text-white transition-transform duration-500 rotate-0 peer-checked:rotate-180">
      <i class="fa-solid fa-chevron-down"></i>
    </div>

    <div class="overflow-hidden transition-all duration-500 max-h-0 peer-checked:max-h-40">
      <ul aria-labelledby="dropdownDefaultButton">
        <div class="rounded-md transition-height">
          <a class="flex items-center text-sm p-3 gap-3" href="/">
            <i class="fa-solid fa-user text-center w-7"></i>
            Account Setting
          </a>
        </div>
      </ul>
    </div>
  </div>

  <div class="mt-5">
    <ul>
      <div class="{{ Request::is('dashboard') ? 'bg-gray-800 text-green-800' : '' }} rounded-md">
        <a class="flex items-center text-sm p-3 gap-3" href="/dashboard">
          <i class="fa-solid fa-chart-pie text-center w-7"></i>
          Dashboard
        </a>
      </div>
      <li class="{{ Request::is('dashboard/transactions') ? 'bg-gray-800 text-green-800' : '' }} rounded-md">
        <a class="flex items-center text-sm p-3 gap-3" href="/dashboard/transactions">
          <i class="fa-solid fa-cash-register text-center w-7"></i>
          Transactions
        </a>
      </li>
      <li class="{{ Request::is('dashboard/recaps') ? 'bg-gray-800 text-green-800' : '' }} rounded-md">
        <a class="flex items-center text-sm p-3 gap-3" href="/dashboard/recaps">
          <i class="fa-solid fa-magnifying-glass-chart text-center w-7"></i>
          Recaps
        </a>
      </li>
    </ul>
  </div>


  <ul class="mt-5">
    <li class="text-sm text-green-800 font-bold mb-2">Admin</li>
    <li class="{{ Request::is('dashboard/users') ? 'bg-gray-800 text-green-800' : '' }} rounded-md">
      <a class="flex items-center text-sm p-3 gap-3" href="/dashboard/users">
        <i class="fa-solid fa-users text-center w-7"></i>
        Users Data
      </a>
    </li>
  </ul>

  <div class="absolute inset-x-4 bottom-10">
    <div class="rounded-md">
      <a class="flex items-center p-3 gap-3" href="">
        <i class="fa-solid fa-right-from-bracket text-center w-7"></i>
        Logout
      </a>
    </div>
  </div>
</div>