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
        <p class="login-name"></p>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Вход</button>
    </div>
    <ModalAuth/>
</div>
</template>

<script>
import ModalAuth from "../ModalAuth.vue"
export default {
    name: "HeaderComponent",

    components: {
        ModalAuth
    },

    methods: {
        goToLink(){
            location.replace('/')
        },
    }
}
</script>

<style scoped>

</style>