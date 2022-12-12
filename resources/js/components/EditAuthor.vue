<template>
   <div class="modal fade" id="editAuthorModal" tabindex="-1" aria-labelledby="editAuthorModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="titleAuthorModal">Редактирование автора</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                     <div class="mb-3">
                        <label for="editAuthorChoiceAuthor" class="form-label">Выберите автора</label>
                        <select @change="changeAuthor" v-model="id" class="form-select" aria-label="Default select example">
                            <option  v-for="(author, index) in authors" :author-index="index" :value ="author.id">{{author.fullname}}</option>
                        </select>
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="editAuthorName" class="form-label">ФИО Автора</label>
                        <input v-model="fullname" type="text" class="form-control" id="editAuthorName" aria-describedby="editAuthorName">
                        <div class="form-text">ФИО должно быть уникальным. Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="editAuthorCountry" class="form-label">Страна рождения</label>
                        <input v-model="country" type="text" class="form-control" id="editAuthorCountry" aria-describedby="editAuthorCountry">
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="editAuthorComment" class="form-label">Коментарий</label>
                        <textarea  v-model="comment" class="form-control" id="editAuthorComment" rows="3"></textarea>
                        <div class="form-text">Коментарий, необязательно</div>
                    </div>
                    <div class="mb-3">
                        <p>{{message}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="editAuthor" type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "EditAuthor",

    data() {
        return {
            id: null,
            fullname: null,
            country: null,
            comment: null,
            message: '',
        }
    },
    props: [
        'authors',
    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
            console.log(this.authors)
        },
        changeAuthor() {
           
        },
        editAuthor() {
            axios.post('/admin/updateAuthor', {
                id: this.id,
                fullname: this.fullname,
                country: this.country,
                comment: this.comment,
            }).then(res => {
                if (res.status === 200) {
                    this.message = 'Вы успешно отредактировали автораf'
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