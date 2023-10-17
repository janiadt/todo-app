@extends('layouts.myapp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Todos') }}
</h2>
@endsection

@section('content')

{{-- Tailwind code --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <a href="{{route('todos.create')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</a>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Body
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Submitted
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Edit
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($todos as $todo)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $todo->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $todo->body }}
                </td>
                <td class="px-6 py-4">
                    {{ $todo->created_at }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('todos.show', $todo->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Read more</a>
                </td>
            </tr>
            @empty
            <h4>No todos found</h4>
            @endforelse
            
        </tbody>
        
    </table>

</div>



{{-- <table class="auto-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Snippet</th>
            <th>Created</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @forelse($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->body }}</td>
                <td>{{ $todo->created_at }}</td>
                <td><a href="{{route('todos.show', $todo->id)}}">Read more</a></td>
            </tr>
            
            @empty
            <h4>No todos found</h4>
        @endforelse
        
    </tbody>
</table> --}}


@endsection