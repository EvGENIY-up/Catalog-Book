<template>
<div class="admin my-5 d-flex flex-column">
    <div class="authors-panel d-flex my-5 justify-content-around">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAuthorModal">Добавить авторов</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editAuthorModal">Редактировать авторов</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAuthorModal">Удалить авторов</button>
    </div>
    <div class="categories-panel d-flex my-5 justify-content-around">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Добавить категории</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editCategoryModal">Редактировать категории</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Удалить категории</button>
    </div>
</div>
<AddAuthor/>
<EditAuthor :authors="authors"/>
<DeleteAuthor :authors="authors"/>
<AddCategory/>
<EditCategory :categories="categories"/>
<DeleteCategory :categories="categories"/>
</template>

<script>
import AddAuthor from './AddAuthor.vue';
import EditAuthor from './EditAuthor.vue';
import DeleteAuthor from './DeleteAuthor.vue'
import AddCategory from './AddCategory.vue';
import EditCategory from './EditCategory.vue';
import DeleteCategory from './DeleteCategory.vue';


export default {
    name: "Admin",
    components: {
        AddAuthor,
        EditAuthor,
        DeleteAuthor,
        AddCategory,
        EditCategory,
        DeleteCategory,
    },

    props: [
        'authors',
        'categories',
   ]
}
</script>

<style scoped>

</style>