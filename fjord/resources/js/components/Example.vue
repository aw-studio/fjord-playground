<template>
    <fj-container>
        <fj-navigation />
        <fj-header :title="title" />
    </fj-container>
</template>

<script>
export default {
    name: "Example",
    props: {
        title: {
            required: true,
            type: String
        }
    }
};
</script>
