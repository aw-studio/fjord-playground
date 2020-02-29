<template>
    <b-button variant="outline-primary" size="sm" @click="download">
        <slot />
    </b-button>
</template>

<script>
export default {
    name: "Download",
    props: {
        url: {
            type: String,
            required: true
        },
        filename: {
            type: String,
            required: true
        }
    },
    methods: {
        async download() {
            let response = await axios({
                url: this.url,
                method: "GET",
                responseType: "blob"
            });
            this.forceFileDownload(response);
        },
        forceFileDownload(response) {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement("a");
            link.href = url;
            link.setAttribute("download", this.filename);
            document.body.appendChild(link);
            link.click();
        }
    }
};
</script>
