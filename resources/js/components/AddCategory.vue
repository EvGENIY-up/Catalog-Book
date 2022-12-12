<template>
   <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addCategoryTitle">Добавление категории</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addCategoryName" class="form-label">Название категории</label>
                        <input v-model="title" type="text" class="form-control" id="addCategoryName" aria-describedby="addCategoryName">
                        <div class="form-text">Название должно быть уникальным. Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <label for="addCategoryDescription" class="form-label">Описание</label>
                        <input v-model="description" type="text" class="form-control" id="addCategoryDescription" aria-describedby="addCategoryDescription">
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <p>{{message}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="createCategory" type="submit" class="btn btn-primary">Добавить</button>
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
            title: null,
            description: null,
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
        createCategory() {
            axios.post('/admin/addCategory', {
                title: this.title,
                description: this.description,
            }).then(res => {
                if (res.status === 200) {
                    this.message = 'Вы успешно добавили категорию'
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