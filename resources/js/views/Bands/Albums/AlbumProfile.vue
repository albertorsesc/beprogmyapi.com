<script>
export default {
    name: "AlbumProfile",
    props: {
        album: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            albumTab: 'profile'
        }
    },
    methods: {
        switchTab(tab) {
            this.albumTab = tab;
        }
    },
    components: {
        Songs: () => import(/* webpackChunkName: "songs" */ './Songs/Songs'),
    }
}
</script>

<style scoped>

</style>
