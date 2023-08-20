@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">ToDo List</h1>
        <a href="/tasks/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Task</a>
    </div>

    <ul class="space-y-2">
        @foreach($tasks as $task)
            <li class="bg-white p-4 rounded shadow">
                <input type="checkbox" class="mr-2 form-checkbox h-5 w-5 text-blue-500" {{ $task->completed ? 'checked' : '' }}>
                {{ $task->title }}
                <a href="/tasks/{{ $task->id }}/edit" class="text-blue-500 ml-2">Edit</a>
                <form action="/tasks/{{ $task->id }}" method="POST" class="inline ml-2">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
