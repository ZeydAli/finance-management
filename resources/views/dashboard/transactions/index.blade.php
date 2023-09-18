@extends('dashboard.layouts.main')

@section('container')
  <div class="w-full">
    <form method="get" action="/dashboard/transactions">
    <input type="hidden" id="date-input" name="date">
    <div class="flex items-center justify-between py-4 px-10 w-full">
      <button id="prev-date" class="flex items-center justify-between border border-gray-300 text-gray-900 p-2.5 rounded-l-full w-28 transition-all duration-300 hover:bg-gray-300">
        <i class="fa-solid fa-angle-left px-2"></i>
        <span class="px-6">Prev</span>
      </button>
      <span id="current-date"></span>
      <button id="next-date" class="flex items-center justify-between border border-gray-300 text-gray-900 p-2.5 rounded-r-full w-28 transition-all duration-300 hover:bg-gray-300">
        <span class="px-2">Next</span>
        <i class="fa-solid fa-angle-right px-2"></i>
      </button>
    </div>
    </form>
  </div>

  <div class="bg-gray-900 rounded-md px-8 py-4 flex items-center justify-between">
    <div class="text-lg text-white flex flex-col items-center">
      <h1 class="">Income</h1>
      <div class="text-green-900 font-bold">@php echo number_format($incomeTotal, 0, ',', '.'); @endphp</div>
    </div>
    <div class="text-lg text-white flex flex-col items-center">
      <h1 class="">Expenses</h1>
      <div class="text-red-900 font-bold">@php echo number_format($expensesTotal, 0, ',', '.'); @endphp</div>
    </div>
    <div class="text-lg text-white flex flex-col items-center">
      <h1 class="">Balance</h1>
      <div class="text-gray-500 font-bold">@php echo number_format($balance, 0, ',', '.'); @endphp</div>
    </div>
  </div>

  <div class="mt-4 flex items-center justify-center">
    <button class="bg-green-500 rounded-full w-10 h-10 transition-all duration-200 ease-out hover:w-12 hover:h-12" onclick="location.href='/dashboard/transactions/create'"><i class="fa-solid fa-plus text-white"></i></button>
  </div>

  @foreach($transactions as $transaction)
  <div class="mt-4 flex flex-col gap-4">
    @if($transaction->type_id === 1)
    <button type="button" onclick="location.href='/dashboard/transactions/{{ $transaction->id }}/edit'" class="w-full px-4 py-2 border border-gray-300 rounded-md outline-none hover:bg-green-200">
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
    <button type="button" onclick="location.href='/dashboard/transactions/{{ $transaction->id }}/edit'" class="w-full px-4 py-2 border border-gray-300 rounded-md outline-none hover:bg-red-200">
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
  {{-- <div class="mt-5">
    <form method="get" action="/dashboard/transactions">
      <div
        class="relative mb-3"
        data-te-datepicker-init
        data-te-format="yyyy-mm-dd"
        data-te-input-wrapper-init>
        <input
          type="text" name="date" id="date"
          class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          placeholder="Select a date" value="{{ $selectedDate->toDateString() }}" />
        <label
          for="floatingInput"
          class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
          >Select a date</label
        >
        <button type="submit">Filter</button>
      </div>
    </form>
  </div> --}}

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentDateElement = document.getElementById('current-date');
        const dateInput = document.getElementById('date-input');
        const prevButton = document.getElementById('prev-date');
        const nextButton = document.getElementById('next-date');
        
        let selectedDate = localStorage.getItem('selectedDate');
        if (!selectedDate) {
            selectedDate = new Date();
        } else {
            selectedDate = new Date(selectedDate);
        }

        function updateDateDisplay() {
            const dateString = selectedDate.toISOString().slice(0, 10);
            currentDateElement.textContent = dateString;
            dateInput.value = dateString;
        }

        updateDateDisplay();

        prevButton.addEventListener('click', function() {
            selectedDate.setDate(selectedDate.getDate() - 1);
            updateDateDisplay();
            localStorage.setItem('selectedDate', selectedDate.toISOString());
        });

        nextButton.addEventListener('click', function() {
            selectedDate.setDate(selectedDate.getDate() + 1);
            updateDateDisplay();
            localStorage.setItem('selectedDate', selectedDate.toISOString());
        });
    });
  </script>
@endsection