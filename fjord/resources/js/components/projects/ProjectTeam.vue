<template>
    <div class="d-inline-block">
        <b-button @click="visible = true" size="sm" variant="outline-primary">
            <fa-icon icon="users" />
        </b-button>
        <b-badge variant="secondary">{{
            item.attributes.staff.length
        }}</b-badge>
        <b-modal v-model="visible" title="Project Staff">
            <ul>
                <li v-for="(employee, index) in item.attributes.staff">
                    <b-link
                        :href="`/admin/employees/${employee.id}/edit`"
                        :key="index"
                        >{{ employee.fullName }} ({{
                            employee.department.name
                        }})</b-link
                    >
                </li>
            </ul>
            <template v-slot:modal-footer title="Project Staff">
                <div class="w-100">
                    <b-button
                        variant="primary"
                        size="sm"
                        class="float-right"
                        @click="sendMail"
                    >
                        <fa-icon icon="paper-plane" /> Email To all
                    </b-button>
                </div>
            </template>
        </b-modal>
        <b-modal v-model="email" :title="`Send Message to Staff`">
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
    name: "ProjectTeam",
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            visible: false,
            email: false,
            message: {
                subject: null,
                text: null
            }
        };
    },
    methods: {
        sendMail() {
            this.visible = false;
            this.email = true;
        }
    }
};
</script>
