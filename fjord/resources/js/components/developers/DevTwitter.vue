<template>
    <fj-col :width="12" class="mb-3 d-flex">
        <span>
            <fa-icon
                :icon="['fab', 'twitter']"
                style="color: rgba(29,161,242,1.00);"
            />
            <a :href="model.twitter" target="_blank">Follow on Twitter</a>
        </span>
    </fj-col>
</template>

<script>
export default {
    name: "DevTwitter",
    props: {
        model: {
            type: Object,
            required: true
        }
    }
};
</script>
