<template>
    <div class="cms-bullets">

        <ul class="cms-bullets__list sortable">
            <li v-for="tag in tags">
                <div class="cms-bullets__item">{{ tag.name }}</div>
                <button class="cms-del"></button>
            </li>
        </ul>

        <div class="cms-add">
            <input class="cms-input" type="text" v-model="tag">
            <button class="cms-button" @click="setTag">Добавить</button>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "TagComponent",
        data(){
            return{
                tag: '',
                tags: {}
            }
        },
        created(){
            axios.get('/cms/main/tags').then(response => {
                this.tags = response.data
            })
        },
        methods:{
            setTag(){
                axios.post('/cms/main/add-tag', {
                    tag: this.tag
                }).then(response => {
                    this.tags = response.data
                });
                this.tag = '';
            }
        }
    }
</script>

<style scoped>

</style>
