<template>
    <b-list-group-item
        size="sm"
        href="#"
        @click="visible = !visible"
        class="d-flex justify-content-between align-items-center"
    >
        <div>
            <span class="fj-nav-item_icon">
                <fa-icon icon="file" />
            </span>
            Modal
        </div>
        <b-modal v-model="visible" title="Exmpample Component">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem saepe
            est mollitia ratione facilis necessitatibus voluptatibus, assumenda
            qui eos quos repellendus totam, eveniet maxime ipsam illum non
            possimus consequuntur repellat.
        </b-modal>
    </b-list-group-item>
</template>

<script>
export default {
    name: 'Example',
    data() {
        return {
            visible: false
        };
    }
};
</script>
