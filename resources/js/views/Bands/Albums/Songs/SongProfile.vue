<script>
export default {
    name: "SongProfile",
    props: {
        song: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            songTab: 'profile'
        }
    }
}
</script>
