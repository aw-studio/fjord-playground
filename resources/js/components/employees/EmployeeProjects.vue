<template>
    <div class="d-inline-block employee-projects">
        <b-progress
            :value="value"
            :max="5"
            show-value
            :variant="variant"
        ></b-progress>
    </div>
</template>

<script>
export default {
    name: "EmployeeProjects",
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    computed: {
        value() {
            return this.item.attributes.projects.length;
        },
        variant() {
            switch (this.value) {
                case 1:
                case 2:
                    return "success";
                    break;
                case 3:
                case 4:
                    return "warning";
                    break;
                case 5:
                    return "danger";
                    break;
                default:
            }
        }
    }
};
</script>
<style lang="css" scoped>
.employee-projects {
    min-width: 100px;
}
</style>
