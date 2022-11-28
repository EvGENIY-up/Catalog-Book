<template>
<div class="content mx-3">
<div class="first d-flex justify-content-between">
    <h1 class="content__title mt-5">{{searchTitle()}}</h1>
    <div class="content__search">
        <div class="form-floating" height="10px">
            <select v-model="searchFilter" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option value="1" selected>По названию</option>
                <option value="2">По автору</option>
            </select>
        <label for="floatingSelect">Параметры поиска</label>
        </div>
        <div className="search-block d-flex mt-1">
            <img src="/img/search.svg" alt="search" />
            <img  className="clear cu-p" src="/img/btn-remove.svg" alt="Remove" >
            <input @change="search" v-model="searchString" type="text" placeholder="Поиск..." >
        </div>
    </div>
</div>
<button v-if="user" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addModal">Добавить книгу +</button>
<AddBook/>
<div class="d-flex flex-wrap justify-content-center mx-3">
    <BookComponent v-for="book in bookList.data" @click="goToLink(book.id)" :author="book.author.fullname" :book_id="book.id" :category="book.category.title" :title="book.title" class="cu-p" />
</div>
<div class="pagination justify-content-center d-flex">
    <a v-for="page in bookList.links" :href="page.url" type="button" class="btn btn-outline-primary" :class="{active: page.active}" :key="page.id" ref="buttonRefs">{{buttonLabel(page.label)}}</a>
</div>
</div>
</template>

<script>
import axios from "axios"
import BookComponent from "./BookComponent.vue"
import AddBook from "./AddBook.vue"
export default {
    name: "HomeComponent",

    components: {
        BookComponent,
        AddBook,
    },
    props: [
        'book_prop',
        'user',
    ],
      data() {
          return {
            searchFilter: 1,
            bookList: this.book_prop,
            searchString: '',
            date:'Monday',
        } 
    },
    mounted() {
        this.update()
        this.moreBookInfo()
    },
    methods: {        
        update: function () {
            console.log(this.book_prop)
        },
        goToLink(id){
            location.replace('/book/' + id)
        },
        buttonLabel(label) {
            let isNumber = Number(label) ? Number(label) : false
            if (isNumber) {
                return isNumber
            }
            return label === '&laquo; Previous' ? 'Назад' : 'Вперёд' 
        },
        moreBookInfo() {
            console.log(this.$refs.buttonRefs[1])
        },
        search() {
            axios.get('http://127.0.0.1:8000/books?value=' + this.searchString + '&type=' + this.searchFilter).then((response) => {
                this.bookList = response.data;
            });
        },
        searchTitle() {
            if (this.searchString === '') {
                return 'Все книги'
            }
            return 'Поиск по запросу: ' + this.searchString
        },
    },
    computed: {
        russianDate() {
            return 
        }
    }
}

</script>

<style scoped>

</style>