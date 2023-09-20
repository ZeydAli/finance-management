@extends('dashboard.layouts.main')

@section('container')
  <div>
    <h1 class="text-lg font-bold">This is Recaps Module</h1>
  </div>
  <div>
    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}
  </div>
@endsection

@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection