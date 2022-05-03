<template>
    <div>
        <div class="mt-4 flex justify-end">
            <a role="button"
               v-if="albumTab === 'albums'"
               @click="switchAlbumTab('create-album')"
               class="text-sm text-gray-400 hover:text-gray-600 hover:underline transition"
            >New Album</a>
            <a role="button"
               v-if="albumTab === 'create-album'"
               @click="switchAlbumTab('albums')"
               class="text-sm text-gray-400 hover:text-gray-600 hover:underline transition"
            >Albums</a>
        </div>

        <album-list v-if="albumTab === 'albums'" :band="localBand"></album-list>

        <create-album v-if="albumTab === 'create-album'" :band="localBand"></create-album>
    </div>
</template>

<script>
export default {
    name: "Albums",
    props: {
        band: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            localBand: this.band,
            albumTab: 'albums',
        }
    },
    methods: {
        switchAlbumTab(tab) {
            this.albumTab = tab;
        }
    },
    mounted() {
        Event.$on('album-created', album => {
            this.switchAlbumTab('albums');
        });
    },
    components: {
        AlbumList: () => import(/* webpackChunkName: "album-list" */ './AlbumList'),
        CreateAlbum: () => import(/* webpackChunkName: "create-album" */ './CreateAlbum'),
    }
}
</script>

<style scoped>

</style>
