<template>
    <b-dropdown-item @click="download" class="text-secondary">
        Export XLSX
    </b-dropdown-item>
</template>

<script>
import FileDownload from "js-file-download";

export default {
    name: "ExportEmployeesControl",
    computed: {
        url() {
            return `/export-employees`;
        },
        filename() {
            return `employees.xlsx`;
        }
    },
    methods: {
        async download() {
            let response = await axios.get(`${this.url}`);

            // Using js-file-download to download onClick.
            FileDownload(response.data, this.filename);
        }
    }
};
</script>
