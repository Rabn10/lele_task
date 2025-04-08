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
                {{ __('View Cadidates') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-4 flex justify-end">
                    <a href="{{ url('/uploadCV') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                        Upload CV
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase tracking-wider">Rank</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase tracking-wider">Skills</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase tracking-wider">Total Score</th>
                            </tr>
                        </thead>
                        {{-- <tbody class="bg-white divide-y divide-gray-200 text-sm text-black ">
                            @foreach ($skills as $skill)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $skill->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $skill->score }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                        <a href="{{ url('/editSkill/'.$skill->id) }}" 
                                           class="bg-green-500 hover:bg-green-600 text-white font-medium py-1 px-3 rounded">
                                            Edit
                                        </a>
                                        <form action="{{ url('/deleteSkill', $skill->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rabin Awale</td>
                                <td>rabin.awale09@gamil.com</td>
                                <td>Laravel, React, Node</td>
                                <td>90</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
    
</body>
</html>
<script src="https://cdn.tailwindcss.com"></script>
