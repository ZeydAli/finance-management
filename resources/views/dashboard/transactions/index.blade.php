@extends('dashboard.layouts.main')

@section('container')
  <div class="w-full">
    <form method="get" action="/dashboard/transactions">
    <input type="hidden" id="date-input" name="date">
    <div class="flex items-center justify-between py-4 px-10 w-full">
      <button id="prev-date" class="group flex items-center justify-center hover:bg-component text-gray-900 h-10 w-10 rounded-lg">
        <i class="fa-solid fa-angle-left text-gray-500 group-hover:text-white"></i>
      </button>
      <span id="current-date" class="text-white text-lg font-semibold" style="display: none;"></span>
      <span id="formatted-date" class="text-white text-lg font-semibold"></span>
      <button id="next-date" class="group flex items-center justify-center hover:bg-component text-gray-900 h-10 w-10 rounded-lg">
        <i class="fa-solid fa-angle-right text-gray-500 group-hover:text-white"></i>
      </button>
    </div>
    </form>
  </div>

  <div class="rounded-md px-8 py-4 flex items-center justify-between gap-5">
    <div class="text-white flex gap-3 items-center bg-component rounded-lg w-full px-2 py-3">
      <i class="fa-solid fa-angles-up bg-component2 p-3 ml-2 rounded-full text-income"></i>
      <div>
        <h1 class="text-sm">Income</h1>
        <div class="text-income font-bold">@php echo number_format($incomeTotal, 0, ',', '.'); @endphp</div>
      </div>
    </div>
    <div class="text-white flex gap-3 items-center bg-component rounded-lg w-full px-2 py-3">
      <i class="fa-solid fa-angles-down bg-component2 p-3 ml-2 rounded-full text-expenses"></i>
      <div>
        <h1 class="text-sm">Expenses</h1>
        <div class="text-expenses font-bold">@php echo number_format($expensesTotal, 0, ',', '.'); @endphp</div>
      </div>
    </div>
    <div class="text-white flex gap-3 items-center bg-component rounded-lg w-full px-2 py-3">
      <i class="fa-solid fa-wallet bg-component2 p-3 ml-2 rounded-full text-rootBlue"></i>
      <div>
        <h1 class="text-sm">Balance</h1>
        <div class="text-gray-500 font-bold">@php echo number_format($balance, 0, ',', '.'); @endphp</div>
      </div>
    </div>
  </div>

  <div class="mt-4 flex items-center justify-center">
    <button class="group bg-component rounded-lg h-10 w-10" onclick="location.href='/dashboard/transactions/create?date={{$selectedDate}}'">
      <i class="fa-solid fa-plus text-gray-500 group-hover:text-white"></i>
    </button>
  </div>

  <div class="p-20">
    @foreach($transactions as $transaction)
    <div class="mt-3 flex flex-col gap-4">
      @if($transaction->type_id === 1)
      <button type="button" onclick="location.href='/dashboard/transactions/{{ $transaction->id }}/edit'" class="w-full px-4 py-2 rounded-lg outline-none bg-component hover:bg-component2">
        <div class="flex items-center justify-between">
          <div class="flex flex-col items-start text-white">
            <p class="font-semibold text-lg">{{ $transaction->title }}</p>
            <p class="text-income bg-background px-2 py-1 mt-2 rounded-sm text-xs">{{ $transaction->category }}</p>
          </div>
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-arrow-trend-up text-income"></i>
            <div class="text-income font-bold">+ @php echo number_format($transaction->amount, 0, ',', '.'); @endphp</div>
            <i class="fa-solid fa-angle-right text-gray-500"></i>
          </div>
        </div>
      </button>
      @else
      <button type="button" onclick="location.href='/dashboard/transactions/{{ $transaction->id }}/edit'" class="w-full px-4 py-2 rounded-lg outline-none bg-component hover:bg-component2">
        <div class="flex items-center justify-between">
          <div class="flex flex-col items-start text-white">
            <p class="font-semibold text-lg">{{ $transaction->title }}</p>
            <p class="text-expenses bg-background px-2 py-1 mt-2 rounded-sm text-xs">{{ $transaction->category }}</p>
          </div>
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-arrow-trend-down text-expenses"></i>
            <div class="text-expenses font-bold">- @php echo number_format($transaction->amount, 0, ',', '.'); @endphp</div>
            <i class="fa-solid fa-angle-right text-gray-500"></i>
          </div>
        </div>
      </button>
      @endif
    </div>
    @endforeach
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentDateElement = document.getElementById('current-date');
        const formattedDateElement = document.getElementById('formatted-date');
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

            const formattedDateString = formatDate(selectedDate);
            formattedDateElement.textContent = formattedDateString;
        }

        function formatDate(date) {
          const options = { year: 'numeric', month: 'short', day: 'numeric' };
          return date.toLocaleDateString('en-US', options);
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