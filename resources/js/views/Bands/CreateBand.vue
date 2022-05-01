<template>
    <div class="space-y-6">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Band Basic Information</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        We try to keep all information up to date and accurate that is why all posts
                        are reviewed by our team, thank you for collaborating with BeProgMyApi.
                    </p>
                    <p class="my-3 text-sm text-gray-500">
                        You can fill the rest of the information once inside the Band profile and when you're feeling up to.
                    </p>
                    <p class="mt-3 text-sm text-teal-400 font-bold">
                        Reward: +5 points.
                    </p>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form @submit.prevent class="space-y-6" enctype="multipart/form-data" id="create-band">
                        <div class="grid grid-cols-4 gap-6">
                            <!-- Name -->
                            <div class="col-span-3 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Name
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text"
                                           v-model="bandForm.name"
                                           id="name"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Caligula's Horse">
                                </div>
                                <p v-if="errors.name" v-text="errors.name[0]" class="text-red-500"></p>
                            </div>

                            <!-- Genres -->
                            <div class="col-span-3 sm:col-span-2">
                                <label for="genres" class="block text-sm font-medium text-gray-700">
                                    Genres
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select v-model="bandForm.genres"
                                            id="genres"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                            multiple>
                                        <option value="" selected disabled>Select Genre</option>
                                        <option v-for="genre in genres"
                                                :key="genre.id"
                                                :value="genre.id"
                                                v-text="genre.name"
                                        ></option>
                                    </select>
                                </div>
                                <p v-if="errors.genres" v-text="errors.genres[0]" class="text-red-500"></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-6">
                            <!-- StartedAt -->
                            <div class="col-span-3 sm:col-span-2">
                                <label for="started_at"
                                       class="block text-sm font-medium text-gray-700">
                                    Playing since Year (YYYY)
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text"
                                           v-model="bandForm.started_at"
                                           id="started_at"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                           placeholder="2011">
                                </div>
                                <p v-if="errors.started_at" v-text="errors.started_at[0]" class="text-red-500"></p>
                            </div>

                            <!-- Country -->
                            <div class="col-span-3 sm:col-span-2">
                                <label for="country_id" class="block text-sm font-medium text-gray-700">
                                    Country
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select v-model="bandForm.country"
                                            id="country_id"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                                        <option value="" selected disabled>Select Country</option>
                                        <option v-for="country in countries"
                                                :key="country.id"
                                                :value="country"
                                                v-text="country.name"
                                        ></option>
                                    </select>
                                </div>
                                <p v-if="errors.country_id" v-text="errors.country_id[0]" class="text-red-500"></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-4 gap-6">
                            <!-- City -->
                            <div class="col-span-3 sm:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">
                                    City
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text"
                                           v-model="bandForm.city"
                                           id="city"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                           placeholder="Brisbane">
                                </div>
                                <p v-if="errors.city" v-text="errors.city[0]" class="text-red-500"></p>
                            </div>

                            <!-- OfficialSite -->
<!--                            <div class="col-span-3 sm:col-span-2">
                                <label for="company_website" class="block text-sm font-medium text-gray-700">
                                    Official Site
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                      https://
                                    </span>
                                    <input type="text"
                                           name="company_website"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="caligulashorse.com">
                                </div>
                            </div>-->
                        </div>

                        <!-- Bio -->
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700">
                                Band's Bio
                            </label>
                            <div class="mt-1">
                                <textarea id="bio"
                                          v-model="bandForm.bio"
                                          rows="10"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                          placeholder="The band started..."
                                ></textarea>
                            </div>
                        </div>

                        <!-- Logo -->
                        <div>
                            <file-uploader :on-add-file="onAddFile"/><!-- -->
                            <label class="block text-sm font-medium text-gray-700">
                                Band's Photo or Logo
                            </label>
                            <div class="mt-2 flex items-center space-x-5">
                                              <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                  <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                              </span>

                                <button type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Select logo
                                </button>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Notifications</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        I will like to receive notifications when this band gets updated.
                    </p>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form class="space-y-6" action="#" method="POST">
                        <fieldset>
                            <legend class="text-base font-medium text-gray-900">By Email</legend>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-start">
                                    <div class="h-5 flex items-center">
                                        <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="comments" class="font-medium text-gray-700">Comments</label>
                                        <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="#" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </a>
            <button @click="store"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </div>
</template>

<script>

export default {
    emits: ['band-created'],
    data() {
        return {
            bandsEndpoint: '/bands',
            genresEndpoint: '/genres',
            countriesEndpoint: '/countries',
            bandForm: {
                name: '',
                started_at: '',
                country: {},
                genres: [],
                city: '',
                bio: '',
                image: '',
            },
            countries: [],
            genres: [],

            errors: [],
            loading: false,
        }
    },
    methods: {
        store() {
            this.loading = true;
            axios.post(this.bandsEndpoint, {
                name: this.bandForm.name,
                started_at: this.bandForm.started_at,
                country_id: this.bandForm.country ? this.bandForm.country.id : null,
                city: this.bandForm.city,
                bio: this.bandForm.bio,
                genres: this.bandForm.genres,
                image: this.bandForm.image,
            }).then(response => {
                Event.$emit('band-created', response.data);
                this.loading = false;
            }).catch(error => {
                this.errors = error.response.status === 422 ?
                    error.response.data.errors : []
                console.log(error)
                this.loading = false;
            })
        },
        getCountries() {
            axios.get(this.countriesEndpoint)
                .then(response => {
                    this.countries = response.data.data;
                }).catch(error => {
                    console.log(error)
                })
        },
        getGenres() {
            axios.get(this.genresEndpoint)
                .then(response => {
                    this.genres = response.data.data;
                }).catch(error => {
                    console.log(error)
                })
        },
        onAddFile(error, file) {
            if (error) {
                console.log('onError', error)
            }
            this.bandForm.image = file.getFileEncodeDataURL();
        },
    },
    mounted() {
        this.getGenres()
        this.getCountries()
    },
    components: {
        FileUploader: () => import(/* webpackChunkName: "file-uploader" */ '../../components/FileUploader'),
    },
}
</script>
