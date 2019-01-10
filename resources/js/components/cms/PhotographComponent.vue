<template>
    <div class="cms-photographers">

        <div class="cms-all-users">
            <span>Всего -</span> <span>10</span>
        </div>

        <table class="cms-table">
            <thead>
            <tr class="cms-table__head">
                <th>
                    <div class="cms-table__caption">Дата регистрации</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Имя</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Фамилия</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Дата рождения</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Телефон</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Email</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Сайт</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Город</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Статус</div>
                    <div class="cms-table__sort">
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-down"></div>
                        </div>
                        <div class="cms-table__sort-item">
                            <div class="cms-table__sort-arrow arrow-up"></div>
                        </div>
                    </div>
                </th>
                <th>
                    <div class="cms-table__caption">Ред.</div>
                </th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="photograph, index in photographs" v-if="photograph.user_data !== null">
                    <td>{{ photograph.created_at }}</td>
                    <td>{{ photograph.user_data.first_name }}</td>
                    <td>{{ photograph.user_data.last_name }}</td>
                    <td>{{ photograph.user_data.birth_date }}</td>
                    <td>{{ photograph.user_data.phone }}</td>
                    <td>{{ photograph.email }}</td>
                    <td>{{ photograph.user_data.site }}</td>
                    <td>{{ photograph.user_data.city }}</td>
                    <td>
                        <div class="cms-btn--check">
                            <div class="cms-btn--check__wrap">
                                <div class="cms-btn--check__bg">
                                    <div class="cms-btn--check__out"></div>
                                    <div class="cms-btn--check__in"></div>
                                    <div class="cms-btn--check__switch"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="cms-table__edit">
                        <button class="cms-table__edit-button">
                            <img src="assets/img/icon/edit.svg" alt="">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "PhotographComponent",
        data(){
            return{
                photographs: {}
            }
        },
        created(){
            axios.get('/cms/main/photographs').then(response => {
                console.log(response.data)
                this.photographs = response.data
            })
        }
    }
</script>

<style scoped>

</style>
