<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto">
        <div class="w-[400px] text-center mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-xl my-4">Todo</h2>
                <ul class="flex gap-3">
                    <li><a href="">All</a></li>
                    <li><a href="">Favorite</a></li>
                    <li><a href="">Completed</a></li>
                </ul>
            </div>
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Enter new todo" class="p-4 rounded-3xl w-full">
            </form>
            <ul class="mt-4 text-left">
                @foreach ($data as $item)
                    <li class="p-3 mx-auto mb-2 rounded-md border border-[1px_solid_#fff] relative">
                        {{ $item->title }}
                        <form action="{{ route('todos.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="absolute right-2 top-2">delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
        </div>
    </div>
</body>
</html>