<template>
    <div class="w-full overflow-hidden sm:rounded-md">
        <div class="max-h-96  flex justify-between">
            <ul role="list"
                class="divide-y divide-gray-200 overflow-y-scroll vertical-scrollbar"
                :class="[selectedSong.lyric ? 'w-1/2' : 'w-full']">
                <li v-for="song in songs" :key="song.id" class="shadow">
                    <div @click="selectedSong = song"
                         class="flex items-center px-4 py-4 sm:px-6 block hover:bg-gray-50 cursor-pointer">
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
                                            added
                                            <span v-text="song.created_at"></span>
                                        </p>
                                        <p v-if="song.lyric" class="mt-2 flex items-center text-sm text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            See lyric
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
                </li>
            </ul>

            <div v-if="selectedSong.lyric"
                 class="py-2 px-6 overflow-y-scroll vertical-scrollbar transition"
                 :class="[selectedSong.lyric ? 'w-1/2' : 'hidden']">
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
        },
    },
    data() {
        return {
            songs: this.album.songs,
            selectedSong: {}
        }
    },
    mounted() {
        Event.$on('song-created', song => {
            this.songs.unshift(song);
        });
    }
}
</script>

<style scoped>

</style>
