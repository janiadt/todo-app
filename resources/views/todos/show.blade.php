@extends('layouts.app')

@section('content')
<h1>Show todo</h1>

<p>{{ $todo->id }}</p>
<p>{{ $todo->title }}</p>
<p>{{ $todo->body }}</p>
@endsection