
@extends('layout')

@section('content')


@foreach ($result as $row)
	<p><a href="/user/{{ $row->name }}">{{ $row->name }} </a></p>
	<p><a href="/follow/{{ $row->name }}">フォロー</a></p>

@endforeach
@endsection