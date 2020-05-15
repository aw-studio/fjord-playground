<template>
    <div>
        <b-dropdown
            right
            :text="this.item.status.title"
            :variant="variant"
            size="sm"
        >
            <b-dropdown-item
                v-for="(state, i) in states"
                :key="i"
                @click="setProjectStatus(state)"
            >
                {{ state.translation.en.title }}
            </b-dropdown-item>
        </b-dropdown>
    </div>
</template>

<script>
export default {
    name: "ProjectsState",
    props: {
        item: {
            type: Object,
            required: true
        },
        states: {
            type: Array,
            reqiured: true
        }
    },
    data() {
        return {
            state: this.item.status.title
        };
    },
    methods: {
        async setProjectStatus(state) {
            let response;
            try {
                response = await axios.post(
                    `/set-project-state/${this.item.id}`,
                    {
                        state: state.id
                    }
                );
            } catch (e) {
                return;
            }

            this.state = state.translation.en.title;

            this.$bvToast.toast("Status updated", {
                variant: "success"
            });
            this.$emit("reload");
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
