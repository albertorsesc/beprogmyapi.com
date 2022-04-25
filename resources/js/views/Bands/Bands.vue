<template>
    <div>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="w-full md:flex md:justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Bands
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
                        <button type="button"
                                v-if="bandTab === 'bands.index'"
                                @click="switchTab('bands.create')"
                                class="ml-3 inline-flex justify-center items-center py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-white bg-greenlight hover:bg-greendark hover:font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 transition">
                            New Band
                        </button>
                        <button type="button"
                                v-if="bandTab === 'bands.create'"
                                @click="switchTab('bands.index')"
                                class="ml-3 inline-flex justify-center items-center py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-white bg-greenlight hover:bg-greendark hover:font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 transition">
                            Bands
                        </button>
                    </nav>
                </div>
            </div>
        </header>

        <main class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    <band-list v-if="bandTab === 'bands.index'"></band-list>

                    <create-band v-if="bandTab === 'bands.create'"></create-band>
                </div>
            </div>
        </main>
    </div>

    <!--    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            </div>
        </div>-->
</template>

<script>
export default {
    data() {
        return {
            bandTab: 'bands.index'
        }
    },
    methods: {
        switchTab(tab) {
            this.bandTab = tab
        }
    },
    components: {
        BandList: () => import(/* webpackChunkName: "band-list" */ './BandList'),
    }
}
</script>
