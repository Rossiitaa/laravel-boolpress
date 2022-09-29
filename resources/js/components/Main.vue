<template>
    <main class="container">
        <div v-if="isLoading">
                <LoaderComponent/>
        </div>
        <div class="row p-3">
            <PostCard v-for="post in posts" :key="post.id" :post="post"/>
        </div>
        
    </main>
</template>

<script>
import PostCard from './PostCard.vue';
import LoaderComponent from './LoaderComponent.vue';
import axios from 'axios';

export default {
    components: {
        PostCard,
        LoaderComponent,
    },

    data() {
        return {
            posts: [],
            isLoading: true,
        }
    },

    methods: {
        getPosts() {
            axios.get('/api/posts')
                .then(response => {
                    this.posts = response.data.results.data;
                    this.isLoading = false;
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