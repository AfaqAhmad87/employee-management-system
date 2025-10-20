@extends('layout.index')
@section('content')
<h1 style="padding: 10px">Welcome To {{ auth()->user()->name }}</h1>
@endsection
