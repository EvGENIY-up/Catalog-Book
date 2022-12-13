<template>
   <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editCategoryModalTitle">Редактирование категорий</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                     <div class="mb-3">
                        <label for="editCategoryChoiceCategory" class="form-label">Выберите категорию</label>
                        <select v-model="id" class="form-select" aria-label="Default select example">
                            <option v-for=" category in categories" :value ="category.id">{{category.title}}</option>
                        </select>
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="editCategoryName" class="form-label">Название категории</label>
                        <input v-model="title" type="text" class="form-control" id="editCategoryName" aria-describedby="editCategoryName">
                        <div class="form-text">ФИО должно быть уникальным. Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="editCategoryDecription" class="form-label">Описание</label>
                        <input v-model="description" type="text" class="form-control" id="editCategoryDecription" aria-describedby="editCategoryDecription">
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                         <p class="fs-5 d-flex justify-content-center mt-2" :class="{'text-danger': hasError, 'text-success': noError}">{{message}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="editCategory" type="submit" class="btn btn-primary">Редактировать</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "EditCategory",

    data() {
        return {
            id: null,
            title: null,
            description: null,
            message: '',
            noError: true,
            hasError: false,
        }
    },
    props: [
        'categories',
    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
        },
        editCategory() {
            axios.post('/admin/updateCategory', {
                id: this.id,
                title: this.title,
                description: this.description,
            }).then(res => {
                if (res.status === 200) {
                    this.message = 'Вы успешно отредактировали категорию'
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