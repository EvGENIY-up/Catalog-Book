<template>
   <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление книги</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Выберите автора</label>
                        <select v-model="author_id" class="form-select" aria-label="Default select example" required>
                            <option v-for=" author in authors" :value ="author.id">{{author.fullname}}</option>
                        </select>
                        <div id="passwordHelp" class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Выберите жанр</label>
                        <select v-model="category_id" class="form-select" aria-label="Default select example" required>
                           <option v-for=" category in categories" :value ="category.id">{{category.title}}</option>
                        </select>
                        <div id="passwordHelp" class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Название книги</label>
                        <input v-model="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text" >Название должно быть уникальным</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Год издания</label>
                        <input v-model="year" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required pattern="^[ 0-9]+$">
                        <div id="emailHelp" class="form-text" >В формате от рождества христова (не больше 4 цифр)</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Описание</label>
                        <textarea  v-model="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        <div id="emailHelp" class="form-text" >Подробное описание, не больше 2000 символов</div>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>Обложка
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                        </label>
                    </div>
                    <div class="mb-3">
                        <p>{{message}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="createBook" type="submit" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "AddBook",

    data() {
        return {
            author_id: null,
            category_id: null,
            title: null,
            year: null,
            description: null,
            message: '',
            file: '',
            img: '',
        }
    },
    props: [
        'authors',
        'categories',
    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
        },
        createBook() {
            axios.post('/add', {
                title: this.title,
                year: Number(this.year),
                description: this.description,
                img: this.file,
                author_id: Number(this.author_id),
                category_id: Number(this.category_id),
              

            }).then(res => {
                if (res.status === 200) {
                    this.message = 'Вы успешно добавили книгу'
                }
                else {
                    this.message = res.message
                }
            })
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        },
    }
}
</script>
<style>
    
</style>