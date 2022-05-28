<template>
    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <!--Title-->
        <div class="sm:col-span-3">
            <label for="title" class="block text-sm font-medium text-gray-700">
                Title
                <strong class="text-sm text-red-400">*</strong>
            </label>
            <div class="mt-1">
                <input type="text"
                       v-model="songForm.title"
                       id="title"
                       autocomplete="title"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <p v-if="errors.title" v-text="errors.title[0]" class="text-red-500"></p>
        </div>

        <!--Duration-->
        <div class="sm:col-span-3">
            <label for="duration" class="block text-sm font-medium text-gray-700">
                Duration <span class="text-sm text-gray-600">(MM:SS)</span>
                <span class="text-sm text-gray-400">(optional)</span>
            </label>
            <div class="mt-1">
                <input type="text"
                       v-model="songForm.duration"
                       id="duration"
                       autocomplete="duration"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <p v-if="errors.duration" v-text="errors.duration[0]" class="text-red-500"></p>
        </div>

        <!--Lyric-->
        <div class="sm:col-span-6">
            <label for="lyric" class="block text-sm font-medium text-gray-700">
                Lyric
                <span class="text-sm text-gray-400">(optional)</span>
            </label>
            <div class="mt-1">
                <textarea v-model="songForm.lyric"
                          id="lyric"
                          autocomplete="lyric"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                          rows="8"
                ></textarea>
            </div>
            <p v-if="errors.lyric" v-text="errors.lyric[0]" class="text-red-500"></p>
        </div>

        <!--Save-->
        <div class="sm:col-span-6 flex justify-end items-end">
            <button @click="store" class="btn-primary text-lg" :disabled="isLoading">Save</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateSong",
    props: {
        album: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            songEndpoint: `albums/${this.album.id}/songs`,
            songForm: {
                title: '',
                duration: '',
                lyric: '',
            },

            errors: [],
            isLoading: false,
        }
    },
    methods: {
        store() {
            this.isLoading = true
            axios.post(this.songEndpoint, this.songForm)
                .then(response => {
                    Event.$emit('song-created', response.data.data)
                })
                .catch(error => {
                    this.errors = error.response.status === 422 ?
                        error.response.data.errors : []
                    console.log(error)
                })
                .finally(() => {
                    this.isLoading = false
                })
        },
    },
}
</script>
