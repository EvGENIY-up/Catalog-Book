<template>
    <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteBookTitle">Удаление книги</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены, что хоите удалить эту книгу?
                <p class="fs-5 d-flex justify-content-center mt-2" :class="{'text-danger': hasError, 'text-success': noError}">{{message}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Нет</button>
                <button @click="deleteBook()" type="submit" class="btn btn-danger">Да</button>
            </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    name: "DeleteBook",

    props: [
        'id',
    ],
    data() {
        return {
            message: '',
            noError: true,
            hasError: false,
        }
    },
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
        },
        deleteBook() {
           axios.post('/delete', {
                id: this.id,
            }).then(res => {
                if (res.status === 200) {
                    location.replace('/');
                }
                else {
                    this.message = "У вас нет прав Администратора"
                }
            })
        }
    }
}
</script>
<style>
    
</style>