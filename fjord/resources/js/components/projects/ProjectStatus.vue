<template>
    <div>
        <b-dropdown
            right
            :text="this.item.status.title"
            :variant="`outline-${variant}`"
            size="sm"
        >
            <b-dropdown-item
                v-for="(status, i) in statuses"
                :key="i"
                @click="setProjectStatus(status)"
                >{{ status }}</b-dropdown-item
            >
        </b-dropdown>
    </div>
</template>

<script>
export default {
    name: "ProjectStatus",
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            status: this.item.status.title,
            statuses: [
                "on track",
                "off track",
                "on hold",
                "ready",
                "blocked",
                "finished"
            ]
        };
    },
    methods: {
        async setProjectStatus(status) {
            try {
                const { data } = await axios.post(
                    `/set-project-status/${this.item.id}`,
                    {
                        status
                    }
                );
                this.status = status;

                this.$bvToast.toast("Status updated", {
                    variant: "success"
                });
                this.$bus.$emit("reloadCrudIndex");
            } catch (e) {}
        }
    },
    computed: {
        variant() {
            switch (this.item.status.title) {
                case "on track":
                    return "primary";
                    break;
                case "off track":
                    return "warning";
                    break;
                case "on hold":
                    return "secondary";
                    break;
                case "ready":
                    return "success";
                    break;
                case "blocked":
                    return "danger";
                    break;
                case "finished":
                    return "success";
                    break;
                default:
            }
        }
    }
};
</script>
