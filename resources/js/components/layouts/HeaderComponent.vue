<template>
<div class="header d-flex justify-content-between m-4 border-bottom">
    <div @click="goToLink" class="left-content d-flex cu-p">
        <img src="img/book.svg" alt="Книжка" class="left-content__img" width="50px">
        <div class="name-content ms-3 mt-3">
            <h2 class="site-title">CATALOG-BOOK</h2>
            <p class="site-decription">Лучший книжный веб каталог</p>
        </div>
    </div>
    <div class="right-content d-flex mt-4">
        <p v-if="user" class="login-name">{{user}}</p>
        <template v-else>
            <button type="button" class="btn btn-primary mt-2 in-button" data-bs-toggle="modal" data-bs-target="#authModal">Вход</button>
            <button type="button" class="btn btn-secondary mt-2 reg-button" data-bs-toggle="modal" data-bs-target="#regisModal">Регистрация</button>
        </template>
        <button v-if="admin" @click="adminPanel" type="button" class="btn btn-dark mt-2 admin-button">Админ панель</button>
        <button v-if="user" type="button" class="btn btn-warning mt-2 out-button" data-bs-toggle="modal" data-bs-target="#authOutModal">Выход</button>
    </div>
    <ModalAuth/>
    <ModalRegiste/>
    <ModalAuthOut/>
</div>
</template>

<script>
import ModalAuth from "../ModalAuth.vue"
import ModalRegiste from "../ModalRegiste.vue"
import ModalAuthOut from "../ModalAuthOut.vue"
import axios from "axios"
export default {
    name: "HeaderComponent",

    props: [
        'user',
        'admin'
    ],

    components: {
        ModalAuth,
        ModalRegiste,
        ModalAuthOut
    },

    methods: {
        goToLink(){
            location.replace('/')
        },
        adminPanel() {
            axios.get('/admin').then((res) => {
                if (res.status === 432) {
                    location.replace('/')
                }
                else if (res.status === 200) { 
                     location.replace('/admin')
                };
            });
        }
    },

    mounted() {
        console.log(this.user);
    },
}
</script>

<style scoped>

</style>