<script>
export default {
    name: "BandProfile",
    props: {
        band: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            bandTab: 'profile',
        }
    },
    methods: {
        switchTab(tab) {
            this.bandTab = tab;
        }
    },
    components: {
        Albums: () => import(/* webpackChunkName: "albums" */ './Albums/Albums'),
    }
}
</script>

<style scoped>

</style>
