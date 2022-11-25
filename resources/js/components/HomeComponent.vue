<template>
<div>Все книги</div>
<BookComponent/>
</template>

<script>
import BookComponent from "./BookComponent.vue"
export default {
    name: "HomeComponent",

    components: {
        BookComponent
    }
}
</script>

<style scoped>

</style>