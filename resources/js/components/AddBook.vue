<template>
   <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalTitle">Добавление книги</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addBookChoiceAuthor" class="form-label">Выберите автора</label>
                        <select v-model="author_id" class="form-select" aria-label="Default select example" required>
                            <option v-for=" author in authors" :value ="author.id">{{author.fullname}}</option>
                        </select>
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="addBookChoiceCategory" class="form-label">Выберите жанр</label>
                        <select v-model="category_id" class="form-select" aria-label="Default select example" required>
                           <option v-for=" category in categories" :value ="category.id">{{category.title}}</option>
                        </select>
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="adBooklName" class="form-label">Название книги</label>
                        <input v-model="title" type="text" class="form-control" id="adBooklName" aria-describedby="addBookName" required>
                        <div class="form-text" >Название должно быть уникальным</div>
                    </div>
                    <div class="mb-3">
                        <label for="addBookYear" class="form-label">Год издания</label>
                        <input v-model="year" type="text" class="form-control" id="addBookYear" aria-describedby="addBookYear" required pattern="^[ 0-9]+$">
                        <div class="form-text" >В формате от рождества христова (не больше 4 цифр)</div>
                    </div>
                    <div class="mb-3">
                        <label for="addBookDescription" class="form-label">Описание</label>
                        <textarea  v-model="description" class="form-control" id="addBookDescription" rows="3" required></textarea>
                        <div class="form-text" >Подробное описание, не больше 2000 символов</div>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label class="d-flex">
                            <input type="file" id="fileBook" name="fileBook" accept=".jpg, .jpeg, .png" ref="fulpoad" @change="onFileChange"/>
                            <input class="sizeImg" v-model="formData.displayFileSize" type="text" readonly/>
                        </label>
                    </div>
                    <div class="mb-3">
                        <p class="fs-5 d-flex justify-content-center mt-2" :class="{'text-danger': hasError, 'text-success': noError}">{{message}}</p>
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
            formData: {
                displayFileSize: null,
                linkFileBase64: null,
                file: null,
            },
            author_id: null,
            category_id: null,
            title: null,
            year: null,
            description: null,
            message: '',
            file: '',
            img: '',
            noError: true,
            hasError: false,
        }
    },
    props: [
        'authors',
        'categories',
    ],
    mounted() {
    },
    methods: {
        convertFileToLink(file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                this.formData.linkFileBase64 = event.target.result
            };
            reader.readAsDataURL(file);
        },
        onFileChange(event) {
            if (event.target.files && event.target.files.length) {
                let file = event.target.files[0];
                this.formData.file = file;
                this.formData.displayFileSize = '(' + this.calcSize(file.size) + 'Kb)';
                this.convertFileToLink(this.formData.file);
            }
        },
        calcSize(size) {
            return Math.round(size / 1024);
        },
        createBook() {
            axios.post('/add', {
                title: this.title,
                year: Number(this.year),
                description: this.description,
                img: this.formData.linkFileBase64,
                author_id: Number(this.author_id),
                category_id: Number(this.category_id),
            }).then(response => {
                if (response.status === 200) {
                    this.noError = true
                    this.hasError = false
                    this.message = 'Вы успешно добавили книгу';
                }
            }).catch(error => {
                if (error.response) {
                    this.noError = false
                    this.hasError = true
                    this.message = error.response.data.message;
                    console.log(error.response.data.message);
                }
                else {
                    this.noError = false
                    this.hasError = true
                    this.message = 'Ошибка на стороне сервера';
                }
            })
        },
    }
}
</script>
<style>
    
</style>