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
                {{ __('Upload CV') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="{{ url('/upload-resumes') }}" method="POST"  enctype="multipart/form-data" class="p-6">
                        @csrf
                        <div class="mb-4">
                            <label for="Resume" class="block text-gray-700 text-sm font-bold mb-2">Resume:</label>
                            <input type="file" name="resumes[]" multiple accept="application/pdf" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        {{-- <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Skill</button> --}}
                        <input type="submit" value="Upload CV" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                       
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>