<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto">
        <div class="w-[500px] text-center mx-auto">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl my-4 font-semibold">Todo</h1>
                <ul class="flex gap-2 text-sm text-gray-600">
                    <li><a href="">All</a></li>
                    <li><a href="">Favorite</a></li>
                    <li><a href="">Completed</a></li>
                </ul>
            </div>
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Enter new todo" class="p-3 rounded-3xl w-full border border-gray-300">
            </form>
            <ul class="mt-4 text-left">
                @foreach ($data as $item)
                    <li class="p-3 mx-auto mb-2 rounded-md border border-[1px_solid_#fff] relative">
                        {{ $item->title }}
                        <form action="{{ route('favorite', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="absolute right-7 top-[10px] text-yellow-500 hover:text-yellow-700"><i class="fa fa-star fa-lg"></i></button>
                        </form>
                        <form action="{{ route('completed', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" class="absolute right-2 top-[17px]">
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