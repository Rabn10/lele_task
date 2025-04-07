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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('View Skills') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- <button class="hover:bg-blue-700 text-white mb-4 font-bold py-2 px-4 rounded" style="background: blue">Add Skills</button> --}}
                <div class="mb-4 flex justify-end">
                    <a href="{{ url('/createSkill')}}" class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="background: blue">Add Skills</a>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Skill Name</th>
                                <th>Skill Level</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class='text-center'>
                            <td>1</td>
                            <td>PHP</td>
                            <td>Intermediate</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>