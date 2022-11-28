<template>
   <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление категории</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Выберите категорию</label>
                        <select v-model="id" class="form-select" aria-label="Default select example">
                            <option v-for=" category in categories" :value ="category.id">{{category.title}}</option>
                        </select>
                        <div id="passwordHelp" class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                        <p>{{message}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="deleteCategory" type="submit" class="btn btn-danger">Удалить</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "DeleteCategory",

    data() {
        return {
            id: null,
            message: '',
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
        deleteCategory() {
            axios.post('/admin/deleteCategory', {
                id: Number(this.id),
            }).then(res => {
                if (res.status === 200) {
                    this.message = 'Вы успешно удалили категорию'
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