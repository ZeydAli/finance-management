<div class="min-h-screen w-20 md:w-4/12 lg:w-3/12 xl:w-2/12 p-4 bg-component text-gray-300">
  <div class="rounded-md md:block md:relative overflow-hidden bg-component2 hidden">
    <input type="checkbox" class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer">
    <div class="flex items-center justify-between p-2">
      <div class="flex items-center gap-4">
        <img class="w-10" src="{{ asset('assets/profile.png') }}" alt="">
        <div>
          <p class="text-sm text-gray-500">Signed in as</p>
          <p class="text-sm font-semibold">{{ auth()->user()->username }}</p>
        </div>
      </div>
    </div>

    <div class="absolute top-4 right-3 text-white transition-transform duration-500 rotate-0 peer-checked:rotate-180">
      <i class="fa-solid fa-angle-down"></i>
    </div>

    <div class="overflow-hidden transition-all duration-500 max-h-0 peer-checked:max-h-40 ">
      <ul aria-labelledby="dropdownDefaultButton">
        <div class="rounded-b-md transition-height border-t border-t-gray-700">
          <a class="flex items-center text-sm p-3 gap-3" href="/">
            <i class="fa-solid fa-user text-center w-7"></i>
            Account Setting
          </a>
        </div>
      </ul>
    </div>
  </div>

  <div class="rounded-md md:hidden relative overflow-hidden bg-component2">
    <input type="checkbox" class="peer absolute top-0 inset-x-0 w-full h-12 opacity-0 z-10 cursor-pointer">
    <div class="flex items-center justify-between p-2">
      <div class="flex items-center gap-4">
        <img class="w-10" src="{{ asset('assets/profile.png') }}" alt="">
      </div>
    </div>

    <div class="overflow-hidden transition-all duration-500 max-h-0 peer-checked:max-h-40 ">
      <ul aria-labelledby="dropdownDefaultButton">
        <div class="rounded-b-md transition-height border-t border-t-gray-700">
          <a class="flex items-center text-sm p-3 gap-3" href="/">
            <i class="fa-solid fa-user text-center w-7"></i>
          </a>
        </div>
      </ul>
    </div>
  </div>

  <div class="mt-5">
    <ul>
      <div class="{{ Request::is('dashboard') ? 'bg-accent text-white font-semibold' : 'text-gray-500' }} rounded-md">
        <a class="md:flex items-center text-sm p-3 gap-3 hidden" href="/dashboard">
          <i class="fa-solid fa-chart-pie text-center w-7"></i>
          Dashboard
        </a>
        <a class="items-center justify-center p-3 flex md:hidden my-2" href="/dashboard">
          <i class="fa-solid fa-chart-pie text-center"></i>
        </a>
      </div>
      <li class="{{ Request::is('dashboard/transactions*') ? 'bg-accent text-white font-semibold' : 'text-gray-500' }} rounded-md">
        <a class="md:flex items-center text-sm p-3 gap-3 hidden" href="/dashboard/transactions">
          <i class="fa-solid fa-cash-register text-center w-7"></i>
          Transactions
        </a>
        <a class="items-center justify-center p-3 flex md:hidden my-2" href="/dashboard/transactions">
          <i class="fa-solid fa-cash-register text-center"></i>
        </a>
      </li>
      <li class="{{ Request::is('dashboard/recaps') ? 'bg-accent text-white font-semibold' : 'text-gray-500' }} rounded-md">
        <a class="md:flex items-center text-sm p-3 gap-3 hidden" href="/dashboard/recaps">
          <i class="fa-solid fa-magnifying-glass-chart text-center w-7"></i>
          Recaps
        </a>
        <a class="items-center justify-center p-3 flex md:hidden my-2" href="/dashboard/recaps">
          <i class="fa-solid fa-magnifying-glass-chart text-center"></i>
        </a>
      </li>
    </ul>
  </div>


  <ul class="mt-5">
    <li class="text-sm text-green-700 font-bold mb-2">Admin</li>
    <li class="{{ Request::is('dashboard/users') ? 'bg-accent text-white font-semibold' : 'text-gray-500' }} rounded-md">
      <a class="md:flex items-center text-sm p-3 gap-3 hidden" href="/dashboard/users">
        <i class="fa-solid fa-users text-center w-7"></i>
        Users Data
      </a>
      <a class="items-center justify-center p-3 flex md:hidden my-2" href="/dashboard/users">
        <i class="fa-solid fa-users text-center"></i>
      </a>
    </li>
  </ul>

  <div class="absolute inset-x-4 bottom-10">
    <div class="rounded-md">
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="md:flex items-center p-3 gap-3 text-gray-500 hidden">
          <i class="fa-solid fa-right-from-bracket text-center w-7"></i>
          Logout
        </button>
        <button type="submit" class="flex items-center justify-center md:hidden p-3 gap-3 text-gray-500">
          <i class="fa-solid fa-right-from-bracket text-center"></i>
        </button>
      </form>
    </div>
  </div>
</div>