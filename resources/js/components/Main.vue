<template>
    <main class="container">
        <div class="row p-3">
            <h1>Posts:</h1>
            <PostCard v-for="post in posts" :key="post.id" :post="post"/>
        </div>
        
    </main>
</template>

<script>
import PostCard from './PostCard.vue';
import axios from 'axios';

export default {
    components: {
        PostCard,

    },

    data() {
        return {
            posts: [],
        }
    },

    methods: {
        getPosts() {
            axios.get('/api/posts')
                .then(response => {
                    this.posts = response.data.results.data;
                    /* console.log(this.posts); */
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },

    created() {
        this.getPosts();
    }


}
</script>

<style>

</style>