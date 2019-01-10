<template>
    <div class="sidebar-filter">
        <div class="filter">

            <div class="city-select">
                <div class="city-select__caption">Выбор города</div>
                <select>
                    <option>Москва</option>
                    <option>Санкт-Петербург</option>
                </select>
            </div>
            <div class="filter-type">
                <div class="filter-caption">Вид фотосессии</div>
                <ul class="filter-list">
                    <li class="filter-item" v-for="bullet in bullets">
                        <label>
                            <input class="checkbox-custom" type="checkbox" @change="checkedInput(bullet.bullet)">
                            <span class="checkbox-custom__icon"></span>
                            <span class="filter-item__text">{{ bullet.bullet }}</span>
                        </label>
                    </li>
                </ul>
                <div class="filter__show-more">
                    <span class="filter__show-more-text">ещё</span>
                    <div class="filter__show-more-dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>


            <div class="filter-type">
                <div class="filter-caption">Особенности</div>
                <ul class="filter-list">
                    <li class="filter-item" v-for="tag in tags">
                        <label>
                            <input class="checkbox-custom" type="checkbox">
                            <span class="checkbox-custom__icon"></span>
                            <span class="filter-item__text">{{ tag.name }}</span>
                        </label>
                    </li>
                </ul>
                <div class="filter__show-more">
                    <span class="filter__show-more-text">ещё</span>
                    <div class="filter__show-more-dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <!-- /filter-type -->
        </div>
        <!-- /filter -->
    </div>
    <!-- /sidebar-filter -->
</template>

<script>
    import axios from 'axios';
    export default {
        name: "LeftFilterComponent",
        data(){
            return{
                bullets: {},
                tags: {},
                selectedBullet: [],
            }
        },
        created(){
            axios.get('/photograph/filters').then(response => {
                console.log(response.data);
                this.bullets = response.data.bullets;
                this.tags = response.data.tags;
            });
        },
        methods:{
            checkedInput(arg){
                alert('Выбран элемент ' + arg);
                this.selectedBullet.push(arg);
            }
        }
    }
</script>

<style scoped>

</style>
