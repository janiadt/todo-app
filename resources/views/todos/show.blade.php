@extends('layouts.myapp')

@section('content')
<h1> Single Todo Page </h1>
<h2>{{ $todo->title }}</h2>
<h3>{{ $todo->body }}</h3>
<h3>{{ $todo->user->name }}</h3>
<a href={{route('todos.edit', $todo)}}>
<button class="btn btn-warning" type="button">Edit</button>
</a>
<form action="{{route('todos.destroy', $todo->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit"> Delete</button>
</form>

<a href="{{route('todos.index')}}">Back</a>
@endsection