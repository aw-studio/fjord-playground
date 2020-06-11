<template>
    <div class="text-center">
        <a :href="item.twitter" target="_blank">
            <fa-icon
                :icon="['fab', 'twitter']"
                style="color: rgba(29,161,242,1.00);"
            />
        </a>
    </div>
</template>

<script>
export default {
    name: "DevsTwitter",
    props: {
        item: {
            required: true,
            type: Object
        }
    }
};
</script>
