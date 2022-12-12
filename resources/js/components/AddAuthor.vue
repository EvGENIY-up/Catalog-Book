<template>
   <div class="modal fade" id="addAuthorModal" tabindex="-1" aria-labelledby="addAuthorModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addAuthorTitle">Добавление автора</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addAuthorName" class="form-label">ФИО Автора</label>
                        <input v-model="fullname" type="text" class="form-control" id="addAuthorName" aria-describedby="addAuthorName">
                        <div class="form-text">ФИО должно быть уникальным. Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="addAuthorCountry" class="form-label">Страна рождения</label>
                        <input v-model="country" type="text" class="form-control" id="addAuthorCountry" aria-describedby="addAuthorCountry">
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="addAuthorComment" class="form-label">Коментарий</label>
                        <textarea  v-model="comment" class="form-control" id="addAuthorComment" rows="3"></textarea>
                        <div class="form-text">Коментарий, необязательно</div>
                    </div>
                    <div class="mb-3">
                        <p>{{message}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="createAuthor" type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "AddAuthor",

    data() {
        return {
            fullname: null,
            country: null,
            comment: null,
            message: '',
        }
    },
    props: [
    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
        },
        createAuthor() {
            axios.post('/admin/addAuthor', {
                fullname: this.fullname,
                country: this.country,
                comment: this.comment,
            }).then(res => {
                if (res.status === 200) {
                    this.message = 'Вы успешно добавили автора'
                }
                else {
                    this.message = res.message
                }
            })
        },
    }
}
</script>
<style>
    
</style>