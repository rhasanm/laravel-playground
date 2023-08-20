@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Create Task</h2>

    <form action="/tasks" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold">Title</label>
            <input type="text" name="title" id="title" class="border rounded w-full py-2 px-3">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
    </form>
@endsection
