<template>
    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <!--Title-->
        <div class="sm:col-span-2">
            <label for="title" class="block text-sm font-medium text-gray-700">
                Title
                <strong class="text-sm text-red-400">*</strong>
            </label>
            <div class="mt-1">
                <input type="text"
                       v-model="albumForm.title"
                       id="title"
                       autocomplete="title"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <p v-if="errors.title" v-text="errors.title[0]" class="text-red-500"></p>
        </div>

        <!--ReleaseAt-->
        <div class="sm:col-span-2">
            <label for="released_at" class="block text-sm font-medium text-gray-700">
                Release date <span class="text-sm text-gray-600">(YYYY)</span>
                <span class="text-sm text-gray-400">(optional)</span>
            </label>
            <div class="mt-1">
                <input type="text"
                       v-model="albumForm.released_at"
                       id="released_at"
                       autocomplete="released_at"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <p v-if="errors.released_at" v-text="errors.released_at[0]" class="text-red-500"></p>
        </div>

        <!--RecordLabel-->
        <div class="sm:col-span-2">
            <label for="record_label" class="block text-sm font-medium text-gray-700">
                Record Label
                <span class="text-sm text-gray-400">(optional)</span>
            </label>
            <div class="mt-1">
                <input type="text"
                       v-model="albumForm.record_label"
                       id="record_label"
                       autocomplete="record_label"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <p v-if="errors.record_label" v-text="errors.record_label[0]" class="text-red-500"></p>
        </div>

        <!--AlbumImage-->
        <div class="sm:col-span-4">
            <file-uploader :on-add-file="onAddFile" :is-required="true"/>
            <p v-if="errors.image" v-text="errors.image[0]" class="text-red-500"></p>
        </div>

        <!--Save-->
        <div class="sm:col-span-2 flex justify-end items-end">
            <button @click="store" class="btn-primary text-base" :disabled="isLoading">Save</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateAlbum",
    props: {
        band: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            albumEndpoint: `bands/${this.band.id}/albums`,
            albumForm: {
                title: '',
                released_at: '',
                record_label: '',
                image: '',
            },

            errors: [],
            isLoading: false,
        }
    },
    methods: {
        store() {
            this.isLoading = true
            axios.post(this.albumEndpoint, this.albumForm)
                .then(response => {
                    Event.$emit('album-created', response.data.data)
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
        onAddFile(error, file) {
            if (error) {
                console.log('onError', error)
            }
            this.albumForm.image = file.getFileEncodeDataURL();
        },
    },
    components: {
        FileUploader: () => import(/* webpackChunkName: "file-uploader" */ '../../../components/FileUploader'),
    }
}
</script>

<style scoped>

</style>
