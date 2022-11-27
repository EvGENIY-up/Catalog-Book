<template>
<div class="header d-flex justify-content-between m-4 border-bottom">
    <div @click="goToLink" class="left-content d-flex cu-p">
        <img src="img/book.svg" alt="Книжка" class="left-content__img" width="50px">
        <div class="name-content ms-3 mt-3">
            <h2 class="site-title">CATALOG-BOOK</h2>
            <p class="site-decription">Лучший книжный веб каталог</p>
        </div>
    </div>
    <div class="right-content">
        <p v-if="user" class="login-name">{{user}}</p>
        <template v-else>
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#authModal">Вход</button>
            <button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#regisModal">Регистрация</button>
        </template>
        <button v-if="user" type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#authModal">Выход</button>
    </div>
    <ModalAuth/>
    <ModalRegiste/>
</div>
</template>

<script>
import ModalAuth from "../ModalAuth.vue"
import ModalRegiste from "../ModalRegiste.vue"
export default {
    name: "HeaderComponent",

    props: [
        'user'
    ],

    components: {
        ModalAuth,
        ModalRegiste
    },

    methods: {
        goToLink(){
            location.replace('/')
        },
    },

    mounted() {
        console.log(this.user);
    },
}
</script>

<style scoped>

</style>