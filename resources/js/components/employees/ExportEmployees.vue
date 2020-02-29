<template>
    <div class="d-inline-block">
        <download :url="url" :filename="filename">
            <fa-icon icon="file-excel" /> Export XLSX
        </download>
    </div>
</template>

<script>
export default {
    name: "ExportEmployees",
    computed: {
        url() {
            return `/export-employees`;
        },
        filename() {
            return `employees.xlsx`;
        }
    }
};
</script>
