<template>
    <div>
        <div class="my-4 flex justify-end">
            <a role="button"
               v-if="songTab === 'songs'"
               @click="switchSongTab('create-song')"
               class="text-sm text-gray-400 hover:text-gray-600 hover:underline transition"
            >New Song</a>
            <a role="button"
               v-if="songTab === 'create-song'"
               @click="switchSongTab('songs')"
               class="text-sm text-gray-400 hover:text-gray-600 hover:underline transition"
            >Songs</a>
        </div>

        <song-list v-if="songTab === 'songs'" :album="localAlbum"></song-list>

        <create-song v-if="songTab === 'create-song'" :album="localAlbum"></create-song>
    </div>
</template>

<script>
export default {
    name: "Songs",
    props: {
        album: {
            required: true,
            type: Object
        }
    },
    data() {
        return {
            localAlbum: this.album,
            songTab: 'songs',
        }
    },
    methods: {
        switchSongTab(tab) {
            this.songTab = tab;
        }
    },
    mounted() {
        Event.$on('song-created', song => {
            this.switchSongTab('songs');
        });
    },
    components: {
        SongList: () => import(/* webpackChunkName: "song-list" */ './SongList'),
        CreateSong: () => import(/* webpackChunkName: "create-song" */ './CreateSong'),
    }
}
</script>

<style scoped>

</style>
