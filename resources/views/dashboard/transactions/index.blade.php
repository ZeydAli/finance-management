@extends('dashboard.layouts.main')

@section('container')
  <div class="w-full">
    <form method="get" action="/dashboard/transactions">
    <input type="hidden" id="date-input" name="date">
    <div class="flex items-center justify-between py-4 px-10 w-full">
      <button id="prev-date" class="flex items-center justify-center bg-accent text-gray-900 h-10 w-10 rounded-full">
        <i class="fa-solid fa-angle-left text-white"></i>
      </button>
      <span id="current-date" class="text-white text-lg font-semibold" style="display: none;"></span>
      <span id="formatted-date" class="text-white text-lg font-semibold"></span>
      <button id="next-date" class="flex items-center justify-center bg-accent text-gray-900 h-10 w-10 rounded-full">
        <i class="fa-solid fa-angle-right text-white"></i>
      </button>
    </div>
    </form>
  </div>

  <div class="bg-black rounded-md px-8 py-4 flex items-center justify-between">
    <div class="text-white flex flex-col items-center">
      <h1 class="">Income</h1>
      <div class="text-income font-bold">@php echo number_format($incomeTotal, 0, ',', '.'); @endphp</div>
    </div>
    <div class="text-white flex flex-col items-center">
      <h1 class="">Expenses</h1>
      <div class="text-expenses font-bold">@php echo number_format($expensesTotal, 0, ',', '.'); @endphp</div>
    </div>
    <div class="text-white flex flex-col items-center">
      <h1 class="">Balance</h1>
      <div class="text-gray-500 font-bold">@php echo number_format($balance, 0, ',', '.'); @endphp</div>
    </div>
  </div>

  <div class="mt-4 flex items-center justify-center">
    <button class="bg-accent text-white rounded-full px-4 py-2 font-light" onclick="location.href='/dashboard/transactions/create'">
      <i class="fa-solid fa-plus mr-2"></i> New
    </button>
  </div>

  <div class="p-10">
    @foreach($transactions as $transaction)
    <div class="mt-3 flex flex-col gap-4">
      @if($transaction->type_id === 1)
      <button type="button" onclick="location.href='/dashboard/transactions/{{ $transaction->id }}/edit'" class="w-full px-4 py-2 rounded-md outline-none bg-accent">
        <div class="flex items-center justify-between">
          <div class="flex flex-col items-start text-white text-sm">
            <p class="font-semibold">{{ $transaction->title }}</p>
            <p class="text-gray-500">{{ $transaction->category }}</p>
          </div>
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-arrow-trend-up text-income"></i>
            <div class="text-income font-bold">+ @php echo number_format($transaction->amount, 0, ',', '.'); @endphp</div>
            <i class="fa-solid fa-angle-right text-gray-500"></i>
          </div>
        </div>
      </button>
      @else
      <button type="button" onclick="location.href='/dashboard/transactions/{{ $transaction->id }}/edit'" class="w-full px-4 py-2 rounded-md outline-none bg-accent">
        <div class="flex items-center justify-between">
          <div class="flex flex-col items-start text-white text-sm">
            <p class="font-semibold">{{ $transaction->title }}</p>
            <p class="text-gray-500">{{ $transaction->category }}</p>
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