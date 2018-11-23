<template>
    <div class="cms">
        <div class="cms-container">

            <div class="cms-sidebar">
                <div class="cms-menu">
                    <div class="cms-menu__item cms-menu__item--active">Фотографы</div>
                    <div class="cms-menu__item">Теги (у пользователя)</div>
                    <div class="cms-menu__item" @click="{bullet: true}">Булиты (фильтры)</div>
                </div>
                <div class="cms-exit">
                    <button>Выйти</button>
                </div>
            </div>
            <!-- /cms-sidebar -->

            <div class="cms-content">
                <div class="cms-content__item">

                </div>
                <!-- /cms-content__item -->
                <div class="cms-content__item">

                </div>
                <!-- /cms-content__item -->
                <div class="cms-content__item" v-if="bullet">
                    <bullets-component></bullets-component>
                </div>
                <!-- /cms-content__item -->
            </div>
            <!-- /cms-content -->

        </div>
        <!-- /cms-container -->
    </div>
    <!-- /cms -->

    <div class="cms-edit-user">

    </div>
    <!-- /cms-edit-user -->
</template>

<script>
    import BulletsComponent from './BulletsComponent.vue';
    export default {
        name: "MainComponent",
        components:{
          BulletsComponent,
        },
        data(){
            return{
                bullet: false,
            }
        }
    }
</script>

<style scoped>

</style>
