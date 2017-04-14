@extends('layouts.master')

@session('content')
<h2>{{ $exception->getMessage() }}</h2>
@endsection('content')