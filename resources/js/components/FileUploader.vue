<template>
    <file-pond
        :instant-upload="false"
        :store-as-file="true"
        label-idle="Drop files here..."
        accepted-file-types="image/jpeg, image/png"
        @addfile="onAddFile"
    />
</template>

<script>
import vueFilePond from 'vue-filepond';
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginFileEncode from "filepond-plugin-file-encode";

const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginFileEncode,
);

export default {
    props: ['data', 'onAddFile'],
    data() {
        return {
            localData: this.data,
        }
    },
    components: {
        FilePond,
    },
}
</script>
