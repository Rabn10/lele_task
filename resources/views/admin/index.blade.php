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
                        <tbody class="bg-white divide-y divide-gray-200 text-sm text-black ">
                            @foreach ($candidates as $candidate)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $candidate->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $candidate->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $candidate->skills }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $candidate->score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
    
</body>
</html>
<script src="https://cdn.tailwindcss.com"></script>
