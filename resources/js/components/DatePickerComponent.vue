<template>
    <vue-pikaday
        v-model="now"
    />
</template>

<script>
    import '@enrian/vue-pikaday';

    export default {
        data() {
            return {
                now: null
            }
        }
    }
</script>

<style scoped>

</style>
