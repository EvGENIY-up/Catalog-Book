<template>
   <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="authModalTitle">Авторизация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="authModalEmail" class="form-label">Email (почта)</label>
                        <input v-model="email" type="email" class="form-control" id="authModalEmail" aria-describedby="authModalEmail">
                        <div class="form-text">Введите ваш email</div>
                    </div>
                    <div class="mb-3">
                        <label for="authModalPassword" class="form-label">Пароль</label>
                        <input v-model="password" type="password" class="form-control" id="authModalPassword">
                         <div class="form-text">Введите ваш пароль</div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="authModalRememberMe">
                        <label class="form-check-label" for="authModalRememberMe">Запопнить меня</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="defineUser" type="submit" class="btn btn-primary">Отправить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "ModalAuth",

    data() {
        return {
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
        defineUser() {
            axios.post('/auth', {
                email: this.email,
                password: this.password,
            }).then(res => {
                if (res.status === 200) {
                    location.replace('/') 
                }
            })
        },
    }
}
</script>
<style>
    
</style>