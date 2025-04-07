<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
                {{ __('Add Skills') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="{{ url('/storeSkill') }}" method="POST" class="p-6">
                        @csrf
                        <div class="mb-4">
                            <label for="skill_name" class="block text-gray-700 text-sm font-bold mb-2">Skill Name:</label>
                            <input type="text" name="name" id="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="skill_level" class="block text-gray-700 text-sm font-bold mb-2">Score:</label>
                            <input type="text" name="score" id="score" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        {{-- <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Skill</button> --}}
                        <input type="submit" value="Add Skill" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>