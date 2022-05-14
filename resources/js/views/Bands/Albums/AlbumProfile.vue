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
    }
}
</script>

<style scoped>

</style>
