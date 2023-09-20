@extends('dashboard.layouts.main')
@section('container')
  <form action="/dashboard/transactions" method="post">
    @csrf
    <div class="flex flex-col items-center justify-center">
      @php
          $dateParam = request('date');
      @endphp

      <div class="relative mb-3 w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12" data-te-inline="true" data-te-datepicker-init data-te-input-wrapper-init data-te-format="yyyy-mm-dd">
        <input type="text" id="date" name="date" class="peer block min-h-[auto] w-full rounded-lg bg-component text-white p-2.5 border-0 outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-blue-400 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" required placeholder="Select a date" data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref value="{{ old('date') }}" />
        <label for="floatingInput" class="pointer-events-none absolute left-4 top-1.5 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] text-white text-sm transition-all duration-200 ease-out peer-focus:-translate-y-[5rem] peer-focus:scale-[1] peer-focus:text-blue-400 peer-data-[te-input-state-active]:-translate-y-[1.2rem] peer-data-[te-input-state-active]:-translate-x-[0.2rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Select a date</label>
      </div>

      <div class="mt-2 w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12">
        <label for="type_id" class="block mb-2 text-sm font-medium text-white">Transaction Type</label>
        <select id="type_id" name="type_id" class="text-sm rounded-lg block w-full p-2.5 bg-component border-gray-600 placeholder-gray-400 text-white">
          @foreach ($types as $type)
          @if(old('type_id') == $type->id)
            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
          @else
            <option value="{{ $type->id }}" >{{ $type->name }}</option>
          @endif
          @endforeach
        </select>
      </div>

      <div class="my-2 w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12">
        <label for="number" class="block mb-2 text-sm font-medium text-white">Amount</label>
        <input type="number" name="amount" id="amount" class="@error('amount') is-invalid @enderror bg-component text-white text-sm rounded-lg w-full p-2.5 outline-none" placeholder="Enter amount" required autocomplete="off" value="{{ old('amount') }}">
        @error('amount')
          <div class="text-red-400">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="my-2 w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12">
        <label for="title" class="block mb-2 text-sm font-medium text-white">Title</label>
        <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror bg-component text-white text-sm rounded-lg w-full p-2.5 outline-none" placeholder="Enter title" required autocomplete="off" value="{{ old('title') }}">
        @error('title')
          <div class="text-red-400">
            {{ $message }}
          </div>
        @enderror
        <button id="buttonTitle1" type="button" class="bg-accent p-2 mt-2 rounded-lg text-white text-sm" onclick="clickTitle1()">Gaji Bulanan</button>
        <button id="buttonTitle2" type="button" class="bg-accent p-2 mt-2 rounded-lg text-white text-sm" onclick="clickTitle2()">Jajan</button>
      </div>

      <div class="my-2 w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12">
        <label for="category" class="block mb-2 text-sm font-medium text-white">Category</label>
        <input type="text" name="category" id="category" class="@error('category') is-invalid @enderror bg-component text-white text-sm rounded-lg w-full p-2.5 outline-none" placeholder="Enter category" required autocomplete="off" value="{{ old('category') }}">
        @error('category')
          <div class="text-red-400">
            {{ $message }}
          </div>
        @enderror
        <button id="buttonCategory1" type="button" class="bg-accent p-2 mt-2 rounded-lg text-white text-sm" onclick="clickCategory1()">Freelance</button>
        <button id="buttonCategory2" type="button" class="bg-accent p-2 mt-2 rounded-lg text-white text-sm" onclick="clickCategory2()">Rokok</button>
      </div>

      <div class="my-2 w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12">
        <label for="desc" class="block mb-2 text-sm font-medium text-white">Description</label>
        <textarea id="message" name="desc" id="desc" value="{{ old('desc') }}" rows="4" class="@error('desc') is-invalid @enderror block p-2.5 w-full text-sm rounded-lg bg-component border-gray-600 placeholder-gray-500 text-white" placeholder="Enter description... (optional)"></textarea>
        @error('desc')
          <div class="text-red-400">
            {{ $message }}
          </div>
        @enderror

      </div>
      <div class="flex gap-4 justify-between mt-4 w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12">
        <button type="button" onclick="location.href='/dashboard/transactions?date={{ $dateParam }}'" class="text-white flex items-center gap-2 font-semibold">
          <i class="fa-solid fa-angle-left text-gray-500"></i>
          Back
        </button>
        <button type="submit" class="bg-green-800 text-white py-2 px-4 text-sm font-semibold rounded-lg">
          Submit
        </button>
      </div>
    </div>
  </form>

  <script>
    function clickTitle1() {
        var buttonValue = document.getElementById("buttonTitle1").textContent;
        document.getElementById("title").value = buttonValue;
    }
    function clickTitle2() {
        var buttonValue = document.getElementById("buttonTitle2").textContent;
        document.getElementById("title").value = buttonValue;
    }
    function clickCategory1() {
        var buttonValue = document.getElementById("buttonCategory1").textContent;
        document.getElementById("category").value = buttonValue;
    }
    function clickCategory2() {
        var buttonValue = document.getElementById("buttonCategory2").textContent;
        document.getElementById("category").value = buttonValue;
    }
  </script>
@endsection

