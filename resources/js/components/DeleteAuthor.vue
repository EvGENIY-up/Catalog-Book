<template>
   <div class="modal fade" id="deleteAuthorModal" tabindex="-1" aria-labelledby="deleteAuthorModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteAuthorTitle">Удаление автора</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                     <div class="mb-3">
                        <label for="deleteAuthorChoiceAuthor" class="form-label">Выберите автора</label>
                        <select v-model="id" class="form-select" aria-label="Default select example">
                            <option v-for=" author in authors" :value ="author.id">{{author.fullname}}</option>
                        </select>
                        <div class="form-text">Обязательное поле</div>
                    </div>
                    <div class="mb-3">
                      <p class="fs-5 d-flex justify-content-center mt-2" :class="{'text-danger': hasError, 'text-success': noError}">{{message}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="deleteAuthor" type="submit" class="btn btn-danger">Удалить</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "DeleteAuthor",

    data() {
        return {
            id: null,
            message: '',
            noError: true,
            hasError: false,
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
        },
        deleteAuthor() {
            axios.post('/admin/deleteAuthor', {
                id: Number(this.id),
            }).then(res => {
                if (res.status === 200) {
                    this.message = 'Вы успешно удалили автора'
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