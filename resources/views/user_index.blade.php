@extends('layout')
 
@section('content')

<p>user index</p>
@foreach ($names as $name)
	<p>{{ $name }} </p>
	
@endforeach

@endsection