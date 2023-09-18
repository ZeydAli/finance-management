@extends('dashboard.layouts.main')

@section('container')
  <form action="/dashboard/transactions/{{ $transaction->id }}" method="post">
    @method('put')
    @csrf
    <div>
      <div class="relative mb-3 md:w-64 lg:w-96" data-te-inline="true" data-te-datepicker-init data-te-input-wrapper-init>
        <input type="text" id="date" name="date" class="peer block min-h-[auto] w-full rounded-lg bg-accent text-white p-2.5 border-0 outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-blue-400 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" required placeholder="Select a date" data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref value="{{ old('date', $transaction->date ? date('d/m/Y', strtotime($transaction->date)) : '') }}" />
        <label for="floatingInput" class="pointer-events-none absolute left-4 top-1.5 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] text-white text-sm transition-all duration-200 ease-out peer-focus:-translate-y-[5rem] peer-focus:scale-[1] peer-focus:text-blue-400 peer-data-[te-input-state-active]:-translate-y-[1.2rem] peer-data-[te-input-state-active]:-translate-x-[0.2rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Select a date</label>
      </div>
      <div class="my-2 md:w-64 lg:w-96">
        <select id="type_id" name="type_id" class="bg-accent text-white text-sm rounded-lg block w-full p-2.5 outline-none">
          <option selected>Transaction Types</option>
          @foreach ($types as $type)
          @if(old('type_id', $transaction->type_id) == $type->id)
            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
          @else
            <option value="{{ $type->id }}" >{{ $type->name }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="my-2 md:w-96 lg:w-9/12">
        <input type="number" name="amount" id="amount" class="@error('amount') is-invalid @enderror bg-accent text-white text-sm rounded-lg w-full p-2.5 outline-none" placeholder="Amount" required autocomplete="off" value="{{ old('amount',$transaction->amount) }}">
        @error('amount')
          <div class="text-red-400">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="my-2 md:w-96 lg:w-9/12">
        <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror bg-accent text-white text-sm rounded-lg w-full p-2.5 outline-none" placeholder="Title" required autocomplete="off" value="{{ old('title', $transaction->title ) }}">
        @error('title')
          <div class="text-red-400">
            {{ $message }}
          </div>
        @enderror
        <button id="buttonTitle1" type="button" class="bg-blue-400 p-2 mt-2 rounded-lg text-black text-sm" onclick="clickTitle1()">Gaji Bulanan</button>
        <button id="buttonTitle2" type="button" class="bg-blue-400 p-2 mt-2 rounded-lg text-black text-sm" onclick="clickTitle2()">Jajan</button>
      </div>
      <div class="my-2 md:w-96 lg:w-9/12">
        <input type="text" name="category" id="category" class="@error('category') is-invalid @enderror bg-accent text-white text-sm rounded-lg w-full p-2.5 outline-none" placeholder="Category" required autocomplete="off" value="{{ old('category', $transaction->category ) }}">
        @error('category')
          <div class="text-red-400">
            {{ $message }}
          </div>
        @enderror
        <button id="buttonCategory1" type="button" class="bg-blue-400 p-2 mt-2 rounded-lg text-black text-sm" onclick="clickCategory1()">Freelance</button>
        <button id="buttonCategory2" type="button" class="bg-blue-400 p-2 mt-2 rounded-lg text-black text-sm" onclick="clickCategory2()">Rokok</button>
      </div>
      <div class="my-2">
        <input type="text" name="desc" id="desc" class="@error('desc') is-invalid @enderror bg-accent text-white text-sm rounded-lg w-full p-2.5 outline-none" placeholder="Description (optional)" autocomplete="off" value="{{ old('desc', $transaction->desc) }}">
        @error('desc')
          <div class="text-red-400">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="flex gap-4 justify-between mt-4">
        <button type="button" onclick="location.href='/dashboard/transactions'" class="text-white flex items-center gap-2 font-semibold">
          <i class="fa-solid fa-angle-left text-gray-500"></i>
          Back
        </button>
        <button type="submit" class="bg-green-800 text-white py-2 px-4 text-sm font-semibold rounded-lg">
          Submit
        </button>
      </div>
    </div>
  </form>

  <div class="mt-4 flex items-center justify-center">
    <form action="/dashboard/transactions/{{ $transaction->id }}" method="post">
      @method('delete')
      @csrf
      <button type="submit" class="bg-red-500 rounded-full py-2 px-4 text-white" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash mr-2"></i> Delete</button>
    </form>
  </div>

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

