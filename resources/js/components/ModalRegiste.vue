<template>
   <div class="modal fade" id="regisModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Регистрация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Login пользователя (имя)</label>
                        <input v-model="name" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Имя должно быть уникальным 6-15 символов.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email адресс (почта)</label>
                        <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Обратите внимание. Мы никогда не передадим вашу электронную почту кому-либо еще.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input v-model="password" type="password" class="form-control" id="exampleInputPassword1">
                         <div id="passwordHelp" class="form-text">Пароль должен быть 8-20 cимволов.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="createUser" type="submit" class="btn btn-primary">Отправить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    name: "ModalAuth",

    data() {
        return {
            name: null,
            email: null,
            password: null,
        }
    },
    props: [
        'book_info',
    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
            console.log('Привет')
        },
        createUser() {
            axios.post('/registration', {
                name: this.name,
                email: this.email,
                password: this.password,
            }).then(res => {
                console.log(res);
            })
        }
    }
}
</script>
<style>
    
</style>