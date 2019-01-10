<template>
    <div>
        <div class="cms">
            <div class="cms-container">

                <div class="cms-sidebar">
                    <div class="cms-menu">
                        <div class="cms-menu__item" :class="{ active: tab === 'photo' }" @click="setActiveTab('photo')">Фотографы</div>
                        <div class="cms-menu__item" :class="{ active: tab === 'tag' }" @click="setActiveTab('tag')">Теги (у пользователя)</div>
                        <div class="cms-menu__item" :class="{ active: tab === 'bullet' }" @click="setActiveTab('bullet')">Булиты (фильтры)</div>
                    </div>
                    <div class="cms-exit">
                        <button>Выйти</button>
                    </div>
                </div>
                <!-- /cms-sidebar -->

                <div class="cms-content">
                    <div class="cms-content__item" v-if="tab === 'photo'">
                        <photograph-component></photograph-component>
                    </div>
                    <!-- /cms-content__item -->
                    <div class="cms-content__item" v-if="tab === 'tag'">
                        <tag-component></tag-component>
                    </div>
                    <!-- /cms-content__item -->
                    <div class="cms-content__item" v-if="tab === 'bullet'">
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
    </div>
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
                tab: 'photo'
            }
        },
        methods:{
            setActiveTab: function(arg){
                this.tab = arg
            }
        }
    }
</script>

<style scoped>
    .active{
        background: #36aaec;
    }
</style>
