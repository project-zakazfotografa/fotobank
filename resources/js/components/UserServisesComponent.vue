<template>
    <div>
    <div class="pa-user__price-bottom sortable">
        <div class="pa-user__price-item" v-for="item in servises">

            <div class="pa-user__price-name">
                <input class="pa-input" type="text" :value="item.servise_name !== null ? item.servise_name : ''">
            </div>
            <div class="pa-user__price-free">
                <label>
                    <span>Бесплатно</span>
                    <input type="checkbox" v-if="item.free_of_charge === 1" checked>
                    <input type="checkbox" v-else="item.free_of_charge === null">
                </label>
            </div>
            <div class="pa-user__price-count">
                <input class="pa-input" type="text" :value="item.cost !== null ? item.cost : ''">
                <span>руб.</span>
            </div>
            <div class="pa-user__price-pay">
                <select class="pa-select">
                    <option selected>{{ item.type }}</option>
                </select>
            </div>
        </div>

    </div>
        <div class="pa-user__price-bottom sortable">
        <div class="pa-user__price-item" v-if="addItem">

            <div class="pa-user__price-name">
                <input class="pa-input" type="text" v-model="servise_name">
            </div>
            <div class="pa-user__price-free">
                <label>
                    <span>Бесплатно</span>
                    <input type="checkbox" v-model="free_of_charge">
                </label>
            </div>
            <div class="pa-user__price-count">
                <input class="pa-input" type="text" v-model="cost">
                <span>руб.</span>
            </div>
            <div class="pa-user__price-pay">
                <select class="pa-select" v-model="type">
                    <option selected value="услуга">услуга</option>
                    <option value="час">час</option>
                </select>
            </div>

        </div>
        <div class="user-page__buttons" v-if="addItem">
            <button type="button" class="button button-blue" @click.prevent="storeServises">Сохранить</button>
        </div>
        </div>
    <div class="pa-user__price-add">
        <div class="pa-user__price-add-container" @click="addItem = true">
            <div class="pa-user__price-add-icon">
                <span>+</span>
            </div>
            <div class="pa-user__price-add-text">Добавить ещё</div>
        </div>
    </div>

    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "UserServisesComponent",
        data(){
            return{
                addItem: false,
                servises: {},
                servise_name: '',
                free_of_charge: '',
                cost: '',
                type: '',
            }
        },
        created(){
          axios.get('/photograph/servises').then(response => {
              this.servises = response.data;
          })
        },
        methods:{
            storeServises(){
                axios.post('/photograph/add-servises', {
                    servise_name: this.servise_name,
                    free_of_charge: this.free_of_charge,
                    cost: this.cost,
                    type: this.type,
                }).then(response => {
                    this.servises = response.data;
                });
                this.servise_name = '';
                this.free_of_charge = '';
                this.cost = '';
                this.type = '';
                this.addItem = false;
            }
        }
    }
</script>

<style scoped>

</style>
