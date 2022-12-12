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
                <p>{{this.message}}</p>
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
            message: "У вас нет прав Администратора"
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
                    this.message = res.message
                }
            })
        }
    }
}
</script>
<style>
    
</style>