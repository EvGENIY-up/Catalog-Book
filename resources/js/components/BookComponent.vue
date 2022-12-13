<template>
<div class="book">
    <img  v-if="!img" src="img/md.png" width="170" height="96" alt="Обложка" >
    <img  v-else :src="img" width="170" height="96" alt="Обложка" >
    <h5>{{title}}</h5>
        <div className="d-flex">
            <div className="d-flex flex-column">
                <span>Автор: {{author}}</span>
                <b>Жанр: {{category}}</b>
            </div>
        </div>
</div>
</template>

<script>
export default {
    name: "BookComponent",

    props: [
        'author',
        'category',
        'title',
        'book_id',
        'img',
   ]
}
</script>

<style scoped>

</style>