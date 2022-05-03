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
            localBand: this.band,

            linksEndpoint: `bands/${this.band.id}/links`,
            linkForm: {
                name: '',
                url: ''
            },

            bandTab: 'profile',
            linksTab: 'links',

            errors: [],
            isLoading: false,
        }
    },
    methods: {
        storeLink() {
            this.isLoading = true;
            axios.post(this.linksEndpoint, this.linkForm)
                .then(response => {
                    this.localBand.links.push(response.data.data);
                    this.linkForm = {};
                    this.linksTab = 'links';
                }).catch(error => {
                this.errors = error.response.status === 422 ?
                    error.response.data.errors : []
                console.log(error)
            }).finally(() => {
                this.isLoading = false
            })
        },
        cancelLink() {
            this.linkForm = {};
            this.errors = [];
            this.linksTab = 'links'
        },
        switchTab(tab) {
            this.bandTab = tab;
        }
    },
    mounted() {
        Event.$on('album-created', album => {
            this.localBand.albums.push(album)
        });
    },
    components: {
        Albums: () => import(/* webpackChunkName: "albums" */ './Albums/Albums'),
    }
}
</script>

<style scoped>

</style>
