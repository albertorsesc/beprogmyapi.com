@extends('layouts.app')

@section('title', 'Album: ' . e($album->title))

@section('content')
    <album-profile :album="{{ json_encode($album) }}" inline-template>
        <div>
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="w-full md:flex md:justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Album: <span class="text-greenlight">@{{ album.title }}</span>
                        </h2>

                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="bg-white rounded-md shadow px-6 flex space-x-4">
                                <li class="flex">
                                    <div class="flex items-center">
                                        <a href="/dashboard" class="text-gray-400 hover:text-gray-500">
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
                                        <a href="/bands" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Bands</a>
                                    </div>
                                </li>
                                <li class="flex">
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                        </svg>
                                        <a :href="`/bands/${album.band.id}`"
                                           v-text="album.band.name"
                                           class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                                        ></a>
                                    </div>
                                </li>
                                <li class="flex">
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                        </svg>
                                        <span class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                            Album: @{{ album.title }}
                                        </span>
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
                        <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
                            <div class="flex-1 relative z-0 flex overflow-hidden">
                                <main class="bg-white p-6 rounded-lg shadow-xl flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last" tabindex="0">
                                    <article>
                                        <!-- Profile header -->
                                        <div>
                                            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                                                <div class="sm:flex sm:items-end sm:space-x-5 relative">
                                                    <div class="flex">
                                                        <img v-if="album.image"
                                                             class="h-24 w-24 rounded-lg ring-4 ring-white sm:h-72 sm:w-72 object-contain object-cover"
                                                             :src="album.image"
                                                             :alt="album.title + ' image'"
                                                             loading="lazy">
                                                        <img v-else
                                                             class="h-24 w-24 rounded-lg ring-4 ring-white sm:h-72 sm:w-72 object-contain object-cover"
                                                             src="https://images.unsplash.com/photo-1511220043390-e929fe0edf55?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                                                             alt="placeholder image"
                                                             loading="lazy">
                                                    </div>
                                                    <div class="sm:hidden 2xl:block min-w-0 flex-1 mt-0 top-0">
                                                        <h1 v-text="album.title" class="underline text-3xl font-bold text-greenlight truncate"></h1>
                                                    </div>
                                                    {{--Actions--}}
                                                    <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-4 sm:pb-1">
                                                        <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                                                            {{--Edit--}}
                                                            <button type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                                <span>Edit</span>
                                                            </button>
                                                            {{--Publish--}}
                                                            <button type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                                                </svg>
                                                                <span>Publish</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="hidden sm:block 2xl:hidden mt-6 min-w-0 flex-1">
                                                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                                                        Album: @{{ album.title }}
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tabs -->
                                        <div class="mt-6 sm:mt-2 2xl:mt-5">
                                            <div class="border-b border-gray-200">
                                                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                                                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                                        <a @click="switchTab('profile')"
                                                           href="#"
                                                           :class="[
                                                            albumTab === 'profile' ?
                                                                'border-pink-500 text-gray-900 ' :
                                                                'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
                                                            ]"
                                                           class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                                           aria-current="page">
                                                            Description
                                                        </a>
                                                        <a @click="switchTab('songs')"
                                                           href="#"
                                                           :class="[
                                                            albumTab === 'songs' ?
                                                                'border-pink-500 text-gray-900 ' :
                                                                'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
                                                            ]"
                                                           class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                                        >
                                                            Songs & Lyrics
                                                        </a>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>

                                        <div v-if="albumTab === 'profile'">
                                            <!-- Description list -->
                                            <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                                    {{--ReleasedAt--}}
                                                    <div v-if="album.released_at" class="sm:col-span-1">
                                                        <dt class="text-base font-medium text-gray-500">
                                                            Release Year
                                                        </dt>
                                                        <dd class="mt-1 text-base text-gray-900">
                                                            @{{ album.released_at }}
                                                        </dd>
                                                    </div>

                                                    {{--RecordLabel--}}
                                                    <div v-if="album.record_label" class="sm:col-span-1">
                                                        <dt class="text-base font-medium text-gray-500">
                                                            Record Label
                                                        </dt>
                                                        <dd class="mt-1 text-base text-gray-900">
                                                            @{{ album.record_label }}
                                                        </dd>
                                                    </div>

                                                    {{--PurchaseLink--}}
                                                    <div v-if="album.purchase_link" class="sm:col-span-1">
                                                        <dt class="text-base font-medium text-gray-500">
                                                            Purchase Link
                                                        </dt>
                                                        <dd class="mt-1 text-base text-gray-900">
                                                            <a :href="album.purchase_link"
                                                               v-text="album.purchase_link"
                                                               class="hover:underline hover:text-gray-600"
                                                               target="_blank"
                                                            ></a>
                                                        </dd>
                                                    </div>

                                                    {{--About--}}
                                                    <div v-if="album.description" class="sm:col-span-2">
                                                        <dt class="text-base font-medium text-gray-500">
                                                            Description
                                                        </dt>
                                                        <dd class="mt-1 text-lg font-medium text-gray-900 text-justify">
                                                            <p v-text="album.description"></p>
                                                        </dd>
                                                    </div>
                                                </dl>
                                            </div>
                                        </div>

                                        <songs v-if="albumTab === 'songs'" :album="album"></songs>
                                    </article>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </album-profile>
@endsection
