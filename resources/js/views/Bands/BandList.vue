<template>
    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <li v-for="band in bands"
            :key="band.id"
            class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow-lg divide-y divide-gray-200">
            <div class="flex-1 flex flex-col p-8">
                <img v-if="band.image"
                     class="w-36 h-36 object-cover mx-auto bg-black rounded-full"
                     :src="band.image"
                     :alt="band.name + ' image'">
                <img v-else
                     class="w-36 h-36 object-cover mx-auto bg-black rounded-full"
                     src="https://images.unsplash.com/photo-1511220043390-e929fe0edf55?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1w YWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                     alt="placeholder image">
                <h3 class="mt-6 text-gray-900 text-sm font-medium" v-text="band.name"></h3>
                <dl class="mt-1 flex-grow flex flex-col justify-between">
                    <dt class="sr-only">Country</dt>
                    <dd class="text-gray-500 text-sm">
                        <span v-if="band.city">{{ band.city }}, </span>
                        <span v-text="band.country.name"></span>
                    </dd>
                    <dt class="sr-only">Genres</dt>
                    <dd class="mt-3 flex justify-between">
                        <span v-for="(genre, index) in band.genres"
                              :key="genre.id"
                              v-if="index <= 1"
                              v-text="genre.name"
                              class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full"
                        ></span>
                    </dd>
                </dl>
            </div>
            <div>
                <div class="-mt-px flex divide-x divide-gray-200">
                    <div v-if="false" class="w-0 flex-1 flex">
                        <a href="#" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                            <span class="ml-3">Site</span>
                        </a>
                    </div>
                    <div class="-ml-px w-0 flex-1 flex">
                        <a :href="`/bands/${band.id}`" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
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
</template>

<script>
export default {
    data() {
        return {
            bandsEndpoint: 'bands',
            bands: [],
        }
    },
    methods: {
        getBands() {
            axios.get(this.bandsEndpoint)
                .then(response => {
                    this.bands = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    mounted() {
        this.getBands();
    }
}
</script>
