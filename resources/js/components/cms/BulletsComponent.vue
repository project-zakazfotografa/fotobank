<template>
    <div class="cms-bullets">

        <ul class="cms-bullets__list sortable">
            <li v-for="item in bullets">
                <div class="cms-bullets__item">{{ item.bullet }}</div>
                <button class="cms-del"></button>
            </li>
        </ul>

        <div class="cms-add">
            <input class="cms-input" type="text" v-model="bullet">
            <button class="cms-button" @click="addBullet()">Добавить</button>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "BulletsComponent",
        data(){
            return{
                bullet: '',
                bullets: {},
            }
        },
        created(){
            axios.get('/cms/main/bullets').then(response => {
                this.bullets = response.data;
            });
        },
        methods:{
            addBullet(){
                axios.post('/cms/main/add-bullet', {
                    bullet: this.bullet,
                }).then(response => {
                    this.bullets = response.data;
                });
                this.bullet = ''
            },
        }
    }
</script>

<style scoped>

</style>
