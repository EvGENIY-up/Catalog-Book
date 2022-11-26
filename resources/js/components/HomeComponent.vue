<template>
<div class="content mx-3">
<div class="first d-flex justify-content-between">
    <h1 class="content__title my-5">Все книги</h1>
    <div class="content__search">
        <div class="form-floating" height="10px">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>По названию</option>
                <option value="1">По автору</option>
            </select>
        <label for="floatingSelect">Параметры поиска</label>
        </div>
        <div className="search-block d-flex my-1">
            <img src="/img/search.svg" alt="search" />
            <img  className="clear cu-p" src="/img/btn-remove.svg" alt="Remove" >
            <input  type="text" placeholder="Поиск..." >
        </div>
    </div>
</div>
<div class="d-flex flex-wrap justify-content-center mx-3" v-for="book in book_prop.data">
    <BookComponent :author="book.author.fullname" :book_id="book.id" :category="book.category.title" :title="book.title" />
</div>
</div>
</template>

<script>
import BookComponent from "./BookComponent.vue"
export default {
    name: "HomeComponent",

    components: {
        BookComponent
    },
    props: [
        'book_prop' 
    ],
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
            console.log(this.book_prop)
        }
    }
}

</script>

<style scoped>

</style>