@extends('layouts.app')

@section('title', 'Band')

@section('content')
    <band-profile :band="{{ json_encode($band) }}" inline-template>
        <div>
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="w-full md:flex md:justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Band: <span class="text-greenlight">@{{ band.name }}</span>
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
                                        <span v-text="band.name" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"></span>
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
                                                        <img v-if="band.image"
                                                             class="h-24 w-24 rounded-full ring-4 ring-white sm:h-72 sm:w-72 object-contain object-cover"
                                                             :src="band.image"
                                                             :alt="band.name + ' image'"
                                                             loading="lazy">
                                                        <img v-else
                                                             class="h-24 w-24 rounded-full ring-4 ring-white sm:h-72 sm:w-72 object-contain object-cover"
                                                             src="https://images.unsplash.com/photo-1511220043390-e929fe0edf55?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                                                             alt="placeholder image"
                                                             loading="lazy">
                                                    </div>
                                                    <div class="sm:hidden 2xl:block min-w-0 flex-1 mt-0 top-0">
                                                        <h1 v-text="band.name" class="underline text-3xl font-bold text-greenlight truncate"></h1>
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
                                                    {{--Creator--}}
                                                    <div class="absolute flex justify-end items-end inset-x-0 top-0">
                                                        <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500">
                                                            <div class="flex-shrink-0">
                                                                <img class="h-10 w-10 rounded-full"
                                                                     :src="band.creator.profile_photo_url"
                                                                     :alt="band.creator.name"
                                                                     loading="lazy">
                                                            </div>
                                                            <div class="flex-1 min-w-0">
                                                                <a href="#" class="focus:outline-none">
                                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                                    <p v-text="band.creator.name" class="text-sm font-medium text-gray-900"></p>
                                                                    <p class="text-sm text-gray-500 truncate">Creator of Band</p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="hidden sm:block 2xl:hidden mt-6 min-w-0 flex-1">
                                                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                                                        Band: @{{ band.name }}
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
                                                            bandTab === 'profile' ?
                                                                'border-pink-500 text-gray-900 ' :
                                                                'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
                                                            ]"
                                                           class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                                           aria-current="page">
                                                            Profile
                                                        </a>
                                                        <a @click="switchTab('albums')"
                                                           href="#"
                                                           :class="[
                                                            bandTab === 'albums' ?
                                                                'border-pink-500 text-gray-900 ' :
                                                                'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
                                                            ]"
                                                           class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                                        >
                                                            Albums
                                                        </a>
                                                        <a @click="switchTab('recognitions')"
                                                           href="#"
                                                           :class="[
                                                            bandTab === 'recognition' ?
                                                                'border-pink-500 text-gray-900 ' :
                                                                'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
                                                            ]"
                                                           class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                                        >
                                                            Recognitions
                                                        </a>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>

                                        <div v-if="bandTab === 'profile'">
                                            <!-- Description list -->
                                            <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                                    {{--Genres--}}
                                                    <div class="sm:col-span-1">
                                                        <dt class="text-base font-medium text-gray-500">
                                                            Genres
                                                        </dt>
                                                        <div class="flex flex-wrap items-center">
                                                        <span v-for="genre in band.genres"
                                                              :key="genre.id"
                                                              v-text="genre.name"
                                                              class="w-full lg:w-1/3 mr-4 text-center bg-green-200 py-1 px-2 rounded-full shadow-sm mt-4 text-sm text-green-900 font-semibold"
                                                        ></span>
                                                        </div>
                                                    </div>

                                                    {{--Origin--}}
                                                    <div class="sm:col-span-1">
                                                        <dt class="text-base font-medium text-gray-500">
                                                            Origin
                                                        </dt>
                                                        <dd class="mt-1 text-base text-gray-900">
                                                            <span v-if="band.city">@{{ band.city }}, </span>
                                                            @{{ band.country.name }}
                                                        </dd>
                                                    </div>

                                                    {{--Links--}}
                                                    <div class="sm:col-span-2">
                                                        <dt v-if="linksTab === 'links'"
                                                            class="text-base font-medium text-gray-500">
                                                            <a href="#"
                                                               @click="linksTab = 'add-link'"
                                                               class="text-sm text-gray-500 hover:text-gray-600 hover:underline transition"
                                                            >Add link</a>
                                                        </dt>
                                                        <dd v-if="linksTab === 'add-link'" class="mt-2 flex text-base text-gray-900 items-center">
                                                            <div class="w-1/4 mr-2">
                                                                <input type="text"
                                                                       v-model="linkForm.name"
                                                                       id="name"
                                                                       autocomplete="name"
                                                                       required
                                                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                                       placeholder="Official Site...">
                                                                <p v-if="errors.name" v-text="errors.name[0]" class="text-red-500"></p>
                                                            </div>
                                                            <div class="w-1/3 mr-2">
                                                                <input type="text"
                                                                       v-model="linkForm.url"
                                                                       id="url"
                                                                       autocomplete="url"
                                                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                                       placeholder="https://band.com">
                                                                <p v-if="errors.url" v-text="errors.url[0]" class="text-red-500"></p>
                                                            </div>
                                                            <div class="w-1/3 mr-2 flex">
                                                                <svg @click="storeLink"
                                                                     tabindex="0"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     :class="[errors ? 'mb-1' : '']"
                                                                     class="cursor-pointer text-base text-gray-300 font-light hover:text-green-300 hover:font-medium h-8 w-8 border-none focus:text-green-300 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                                <svg @click="cancelLink"
                                                                     tabindex="0"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     :class="[errors.length > 0 ? 'mb-1' : '']"
                                                                     class="cursor-pointer text-base text-gray-300 font-light hover:text-gray-400 hover:font-medium h-8 w-8 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </div>
                                                        </dd>
                                                        <dd v-else class="mt-2 w-1/3">
                                                            <ul class="flex flex-wrap">
                                                                <li v-for="link in localBand.links" class="w-1/3 mt-1">
                                                                    <a :href="link.url"
                                                                       v-text="link.name"
                                                                       class="hover:underline text-greenlight hover:text-gray-600 underline"
                                                                       target="_blank">
                                                                    ></a>
                                                                </li>
                                                            </ul>
                                                        </dd>
                                                    </div>

                                                    {{--About--}}
                                                    <div v-if="band.bio" class="sm:col-span-2">
                                                        <dt class="text-base font-medium text-gray-500">
                                                            About
                                                        </dt>
                                                        <dd class="mt-1 text-lg font-medium text-gray-900 text-justify">
                                                            <p v-text="band.bio"></p>
                                                        </dd>
                                                    </div>
                                                </dl>
                                            </div>

                                            <div v-if="false" class="mt-8 max-w-5xl mx-auto px-4 pb-12 sm:px-6 lg:px-8">
                                                <h2 class="text-sm font-medium text-gray-500">Team members</h2>
                                                <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                                                        <div class="flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixqx=lGv4MS7e6O&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" loading="lazy">
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <a href="#" class="focus:outline-none">
                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                <p class="text-sm font-medium text-gray-900">
                                                                    Leslie Alexander
                                                                </p>
                                                                <p class="text-sm text-gray-500 truncate">
                                                                    Co-Founder / CEO
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                                                        <div class="flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixqx=lGv4MS7e6O&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" loading="lazy">
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <a href="#" class="focus:outline-none">
                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                <p class="text-sm font-medium text-gray-900">
                                                                    Michael Foster
                                                                </p>
                                                                <p class="text-sm text-gray-500 truncate">
                                                                    Co-Founder / CTO
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                                                        <div class="flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixqx=lGv4MS7e6O&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" loading="lazy">
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <a href="#" class="focus:outline-none">
                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                <p class="text-sm font-medium text-gray-900">
                                                                    Dries Vincent
                                                                </p>
                                                                <p class="text-sm text-gray-500 truncate">
                                                                    Manager, Business Relations
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                                                        <div class="flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=lGv4MS7e6O&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" loading="lazy">
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <a href="#" class="focus:outline-none">
                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                <p class="text-sm font-medium text-gray-900">
                                                                    Lindsay Walton
                                                                </p>
                                                                <p class="text-sm text-gray-500 truncate">
                                                                    Front-end Developer
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <albums v-if="bandTab === 'albums'" :band="band"></albums>

                                        <div v-if="bandTab === 'recognitions'">
                                            <!-- This example requires Tailwind CSS v2.0+ -->
                                            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                                <li class="m-4 col-span-1 flex flex-col text-center bg-white rounded-lg shadow border border-gray-300 divide-y divide-gray-200 hover:border-greenlight transition">
                                                    <div class="relative px-6 py-5 flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500">
                                                        <div class="flex-shrink-0">
                                                            <img class="h-10 w-10 rounded-full"
                                                                 :src="band.creator.profile_photo_url"
                                                                 :alt="band.creator.name"
                                                                 loading="lazy">
                                                        </div>
                                                        <div class="flex-1 min-w-0">
                                                            <a href="#" class="focus:outline-none">
                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                <p v-text="band.creator.name" class="text-sm font-medium text-gray-900"></p>
                                                                <p class="text-sm text-gray-500 truncate">Creator of Band</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </article>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </band-profile>
@endsection
