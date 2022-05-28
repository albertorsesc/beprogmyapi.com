<template>
    <ul role="list" class="mt-4 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
        <li v-for="album in localBand.albums"
            class="relative">
            <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                <img v-if="album.image" :src="album.image" :alt="album.title + ' cover image'" class="object-cover pointer-events-none group-hover:opacity-75">
                <img v-else src="https://images.unsplash.com/photo-1462331940025-496dfbfc7564?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=911&q=80" alt="placeholder cover image" class="object-cover pointer-events-none group-hover:opacity-75">
                <a :href="`/bands/${localBand.id}/albums/${album.id}`" class="absolute inset-0 focus:outline-none">
                    <span class="sr-only" v-text="album.title"></span>
                </a>
            </div>
            <div class="mt-2 flex items-center">
                <p v-text="album.title" class="mr-2 block text-lg font-medium text-greenlight truncate pointer-events-none"></p>
                &bullet;
                <p v-text="album.released_at" class="ml-2 block text-base font-light text-gray-500 pointer-events-none"></p>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: "AlbumList",
    props: {
        band: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            localBand: this.band
        }
    },
}
</script>

<style scoped>

</style>
