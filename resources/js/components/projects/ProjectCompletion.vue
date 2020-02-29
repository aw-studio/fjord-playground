<template>
    <div class="d-inline-block">
        <b-badge :variant="variant">{{ daysLeft }}</b-badge>
    </div>
</template>

<script>
export default {
    name: "ProjectCompletion",
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    computed: {
        daysLeft() {
            return moment(this.item.attributes.completion_date).diff(
                moment(),
                "days"
            );
        },
        variant() {
            if (this.daysLeft > 50) {
                return "success";
            }
            if (this.daysLeft > 30) {
                return "warning";
            }
            if (this.daysLeft > 10) {
                return "danger";
            }
            if (this.daysLeft < 0) {
                return "dark";
            }
        }
    }
};
</script>
