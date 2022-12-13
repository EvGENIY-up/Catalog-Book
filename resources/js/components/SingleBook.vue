<template>
    <div class="book-content d-flex mx-4 my-4">
        <img v-if="!book_info.img" src="/img/book-img.png" width="370" height="600" alt="Обложка книги" class="book-content__img">
        <img v-else :src="book_info.img" width="370" height="600" alt="Обложка книги" class="book-content__img">
        <div class="content-block d mx-5 my-5 ">
            <h3 class="title">{{book_info.title}}</h3>
            <p class="author">Автор: {{book_info.author.fullname}}</p>
            <p class="genre">Жанр: {{book_info.category.title}}</p>
            <p>Год издания: {{book_info.year}}</p>
            <h5 class="description">Описание: {{book_info.description}} </h5>
        </div>
    </div>
    <div class="change-book d-flex justify-content-end mx-3">
        <button v-if="this.book_info.user_id === this.user_id || this.admin" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeBookModal">Редактировать</button>
        <button v-if="this.book_info.user_id === this.user_id || this.admin" type="button" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#deleteBookModal">Удалить</button>
    </div>
    <ChangeBook :defaultTitle="book_info.title" :defaultYear="book_info.year"
    :defaultDescription="book_info.description" :defaultCategory="book_info.category.title"
    :defaultAuthor="book_info.author.fullname" :defaultIdAuthor="book_info.author.id"
    :defaultIdCategory="book_info.category.id" :id="book_info.id" :authors="this.authors" :categories="this.categories"/>
    <DeleteBook :id="book_info.id"/>
</template>
<script>

import ChangeBook from "./ChangeBook.vue"
import DeleteBook from "./DeleteBook.vue"

export default {
    name: "SingleBook",
    components: {
    ChangeBook,
    DeleteBook,
},

    props: [
        'book_info',
        'user_id',
        'admin',
        'categories',
        'authors',
    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
            
        },
        typeUser() {
            if (this.book_info.user_id === this.user_id) {
                
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