<template>
    <div class="pa-user__features-content sortable">
        <div class="pa-user__features-item" v-for="tag in tags" @click="setTag(tag.id)">{{ tag.name }}</div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "TagUserComponent",
        data(){
            return{
                tags: {}
            }
        },
        created(){
            axios.get('/photograph/tags').then(response => {
               this.tags = response.data
            });
        },
        methods:{
            setTag(arg){
                axios.post('/photograph/attach-tag', {
                    tag_id: arg
                }).then(response => {
                    console.log(response.data)
                });
            }
        }
    }
</script>

<style scoped>

</style>
