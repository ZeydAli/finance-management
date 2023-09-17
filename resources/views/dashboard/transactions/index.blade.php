@extends('dashboard.layouts.main')

@section('container')
  <div class="bg-gray-900 rounded-md px-8 py-4 flex items-center justify-between">
    <div class="text-lg text-white flex flex-col items-center">
      <h1 class="">Income</h1>
      <div class="text-green-900 font-bold">0</div>
    </div>
    <div class="text-lg text-white flex flex-col items-center">
      <h1 class="">Expenses</h1>
      <div class="text-red-900 font-bold">0</div>
    </div>
    <div class="text-lg text-white flex flex-col items-center">
      <h1 class="">Balance</h1>
      <div class="text-gray-500 font-bold">0</div>
    </div>
  </div>

  <div class="mt-4 flex items-center justify-center">
    <button class="bg-green-500 rounded-full w-10 h-10 transition-all duration-200 ease-out hover:w-12 hover:h-12" onclick="location.href='/dashboard/transactions/create'"><i class="fa-solid fa-plus text-white"></i></button>
  </div>

  @foreach($transactions as $transaction)
  <div class="mt-4 flex flex-col gap-4">
    @if($transaction->type_id === 1)
    <button type="button" class="w-full px-4 py-2 border border-gray-300 rounded-md outline-none hover:outline-offset-1 hover:outline-green-500 hover:bg-gray-200">
      <div class="flex items-center justify-between">
        <div class="flex flex-col items-start">
          <p>{{ $transaction->title }}</p>
          <p class="text-gray-500">{{ $transaction->category }}</p>
        </div>
        <div class="flex items-center gap-3">
          <div class="text-green-900 font-bold">+ @php echo number_format($transaction->amount, 0, ',', '.'); @endphp</div>
          <i class="fa-solid fa-angle-right text-gray-500"></i>
        </div>
      </div>
    </button>
    @else
    <button type="button" class="w-full px-4 py-2 border border-gray-300 rounded-md outline-none hover:outline-offset-1 hover:outline-red-500 hover:bg-gray-200">
      <div class="flex items-center justify-between">
        <div class="flex flex-col items-start">
          <p>{{ $transaction->title }}</p>
          <p class="text-gray-500">{{ $transaction->category }}</p>
        </div>
        <div class="flex items-center gap-3">
          <div class="text-red-900 font-bold">- @php echo number_format($transaction->amount, 0, ',', '.'); @endphp</div>
          <i class="fa-solid fa-angle-right text-gray-500"></i>
        </div>
      </div>
    </button>
    @endif
  </div>
  @endforeach
@endsection