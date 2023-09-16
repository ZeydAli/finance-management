@extends('dashboard.layouts.main')

@section('container')
  <div>
    <h1 class="text-lg font-bold">Welcome Back, {{ auth()->user()->username }}</h1>
  </div>
@endsection