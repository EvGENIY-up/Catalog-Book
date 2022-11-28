<template>
    <div class="book-content d-flex mx-4 my-4">
        <img src="/img/book-img.png" width="370" height="600" alt="Обложка книги" class="book-content__img">
        <div class="content-block d mx-5 my-5 ">
            <h3 class="title">{{book_info.title}}</h3>
            <p class="author">Автор: {{book_info.author.fullname}}</p>
            <p class="genre">Жанр: {{book_info.category.title}}</p>
            <p>Год издания: {{book_info.year}}</p>
            <h5 class="description">Описание: {{book_info.description}} </h5>
        </div>
    </div>
    <div class="change-book d-flex justify-content-end mx-3">
        <button  type="button" class="btn btn-primary">Редактировать</button>
        <button  type="button" class="btn btn-danger mx-2">Удалить</button>
    </div>
</template>
<script>
export default {
    name: "SingleBook",

    props: [
        'book_info',
        'user_id',
        'admin',
    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
            console.log(this.book_info)
        },
        typeUser() {
            if (book_info.user_id === user_id || admin) {
                return true
            }
            else {
                return false
            }
        }
    }
}
</script>
<style>
    
</style>