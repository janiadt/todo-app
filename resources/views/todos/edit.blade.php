@extends('layouts.myapp')

@section('content')
<h3> Edit Todo </h3>
<form action="{{route('todos.update', $todo->id)}}" method="POST">
	@csrf
	@method('PUT')

	<div>
		<label>Title</label>
		<input type="text" name="title" id="title" value="{{old('title') ? : $todo->title}}">

		@if ($errors->has('title'))
			<span>{{$errors->first('title')}}</span>
		@endif
	</div>
	<div>
		<label>Description</label>
		<input type="text" name="body", id="body" value="{{old('body') ? : $todo->body}}">

		@if ($errors->has('body'))
			<span>{{$errors->first('body')}}</span>
		@endif
	</div>
	<button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
</form>
@endsection