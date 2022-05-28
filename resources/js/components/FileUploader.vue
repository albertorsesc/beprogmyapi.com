<template>
    <file-pond
        :instant-upload="false"
        :store-as-file="true"
        label-idle="Drop Band image or logo here..."
        accepted-file-types="image/jpeg, image/png"
        :required="isRequired"
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
    name: 'FileUploader',
    props: {
        onAddFile: {
            type: Function,
            required: true,
        },
        isRequired: {
            type: Boolean,
            default: false,
        },
    },
    components: {
        FilePond,
    },
}
</script>
