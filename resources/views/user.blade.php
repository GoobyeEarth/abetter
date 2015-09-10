@extends('parts.layout')
 
@section('content')
<h3></h3>

@foreach ($comments as $comment)
@include('parts.comment', ['comment'=>$comment])
@endforeach




@endsection