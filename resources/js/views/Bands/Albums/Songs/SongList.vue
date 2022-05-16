<template>
    <div class="w-full overflow-hidden sm:rounded-md">
        <div class="h-96 flex justify-between">
            <ul role="list" class="w-1/2 divide-y divide-gray-200 overflow-y-scroll vertical-scrollbar">
                <li v-for="song in album.songs" :key="song.id" class="shadow">
                    <a href="#" @click="selectedSong = song" class="block hover:bg-gray-50">
                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <div class="min-w-0 flex-1 flex items-center">
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                        <p v-text="song.title" class="text-sm font-medium text-indigo-600 truncate"></p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                            <span v-text="song.duration"></span>
                                        </p>
                                    </div>
                                    <div class="hidden md:block">
                                        <div>
                                            <p class="text-sm text-gray-900">
                                                Added on
                                                <time datetime="2020-01-07">January 7, 2020</time>
                                            </p>
                                            <p v-if="song.lyric" class="mt-2 flex items-center text-sm text-gray-500">
                                                Lyric
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="song.lyric">
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <div v-if="selectedSong.lyric" class="w-1/2 py-2 px-6 overflow-y-scroll vertical-scrollbar transition">
                <pre v-text="selectedSong.lyric" class="text-base text-gray-700 font-serif"></pre>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SongList",
    props: {
        album: {
            required: true,
            type: Object
        }
    },
    data() {
        return {
            selectedSong: {}
        }
    }
}
</script>

<style scoped>

</style>
