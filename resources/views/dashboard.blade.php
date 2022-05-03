@extends('layouts.app')

@section('content')
    <div>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="w-full md:flex md:justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Bands') }}
                    </h2>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="bg-white rounded-md shadow px-6 flex space-x-4">
                            <li class="flex">
                                <div class="flex items-center">
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <!-- Heroicon name: solid/home -->
                                        <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                        </svg>
                                        <span class="sr-only">Dashboard</span>
                                    </a>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex items-center">
                                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                    </svg>
                                    <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Bands</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </header>

        <main class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow-lg divide-y divide-gray-200">
                            <div class="flex-1 flex flex-col p-8">
                                <img class="w-36 h-36 object-cover mx-auto bg-black rounded-full" src="https://theprogmind.files.wordpress.com/2015/09/press_photo_03.jpg" alt="" loading="lazy">
                                <h3 class="mt-6 text-gray-900 text-sm font-medium">Caligula's Horse</h3>
                                <dl class="mt-1 flex-grow flex flex-col justify-between">
                                    <dt class="sr-only">Country</dt>
                                    <dd class="text-gray-500 text-sm">Brisbane, Australia</dd>
                                    <dt class="sr-only">Genres</dt>
                                    <dd class="mt-3 flex justify-evenly">
                                        <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">Prog. Metal</span>
                                        <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">Prog. Rock</span>
                                    </dd>
                                </dl>
                            </div>
                            <div>
                                <div class="-mt-px flex divide-x divide-gray-200">
                                    <div class="w-0 flex-1 flex">
                                        <a href="#" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                            </svg>
                                            <span class="ml-3">Site</span>
                                        </a>
                                    </div>
                                    <div class="-ml-px w-0 flex-1 flex">
                                        <a href="/bands/show" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span class="ml-3">Profile</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>

    <!--    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            </div>
        </div>-->
@endsection
