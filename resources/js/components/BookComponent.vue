<template>
<div class="book">
    <img src="img/md.png" width="170" alt="Обложка" >
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
        'book_id'
   ]
}
</script>

<style scoped>

</style>