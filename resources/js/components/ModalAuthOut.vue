<template>
    <div class="modal fade" id="authOutModal" tabindex="-1" aria-labelledby="authOutModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="authOutTitle">Выход с аккаунта</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены, что хоите выйти со с аккаунта
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Нет</button>
                <button @click="logOut()" type="submit" class="btn btn-danger">Да</button>
            </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    name: "ModalAuthOut",

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
        logOut() {
            axios.get('/out').then(res => {
                res.status === 200 ? location.replace('/') : false
            })
        }
    }
}
</script>
<style>
    
</style>