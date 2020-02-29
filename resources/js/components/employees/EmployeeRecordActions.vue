<template>
    <div class="d-inlune-block">
        <b-dropdown right variant="primary" size="sm">
            <template v-slot:button-content>
                <fa-icon icon="cogs" />
            </template>
            <b-dropdown-group header="Messages">
                <b-dropdown-item @click="visible = true"
                    >Send Email</b-dropdown-item
                >
            </b-dropdown-group>
            <b-dropdown-group header="Custom Actions">
                <b-dropdown-item href="#">Action</b-dropdown-item>
                <b-dropdown-item href="#">Another action</b-dropdown-item>
                <b-dropdown-item href="#">Something else here</b-dropdown-item>
            </b-dropdown-group>
        </b-dropdown>
        <b-modal
            v-model="visible"
            :title="`Send Message to ${item.attributes.first_name}`"
        >
            <b-form-input
                v-model="message.subject"
                placeholder="Message subject"
                class="mb-2"
            ></b-form-input>
            <b-form-textarea
                v-model="message.text"
                placeholder="Message text"
                rows="3"
                max-rows="6"
            ></b-form-textarea>
            <template v-slot:modal-footer>
                <div class="w-100">
                    <b-button
                        variant="primary"
                        size="sm"
                        class="float-right"
                        @click="visible = false"
                    >
                        <fa-icon icon="paper-plane" /> Send Email
                    </b-button>
                </div>
            </template>
        </b-modal>
    </div>
</template>

<script>
export default {
    name: "EmployeeRecordActions",
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            visible: false,
            message: {
                subject: null,
                text: null
            }
        };
    }
};
</script>
