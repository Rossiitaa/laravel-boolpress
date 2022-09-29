<template>
    <main>
        <LoaderComponent v-if="isLoading"/>
        <div v-else class="container text-center">
            <div class="card-body">
                <img :src="isValidUrl(post.image) ? post.image : 'http://127.0.0.1:8000/storage/' + post.image" class="card-img-top mt-3 w-50" alt="image-post">
                <h5 class="card-title m-3 font-weight-bold">
                    <router-link :to="'/'">
                        {{ post.title }}
                    </router-link>
                </h5>
                <h6 class="card-subtitle m-3">
                    Written by {{ post.user.name }} | {{ post.date }}
                </h6>
                <p class="card-text m-3">
                    {{ post.content }}
                </p>
                <div class=" badge badge-fill m-3" :style=" 'background-color: ' + post.category.color ">
                    <h5 class="m-0"> {{ post.category.name }} </h5>
                </div>
                <div class="m-3">
                    <span v-for="tag in post.tags" :key="tag.id">
                        #{{ tag.name }}
                    </span>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import LoaderComponent from '../components/LoaderComponent.vue';
import axios from 'axios';

export default {
    components: {
        LoaderComponent,
    },

    data() {
        return {
            post: {
                user: {},
                category: {
                    color: ''
                },
            },
            isLoading: true,
        }
    },

    methods: {
        getPosts() {
            const id = this.$route.params.id;
            axios.get(`/api/posts/${id}`)
                .then(response => {
                    this.post = response.data.results.data;
                    this.isLoading = false;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        isValidUrl(string) {
            const regex = /(?:https?):\/\/(\w+:?\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
            if(!regex .test(string)) {
                return false;
            } else {
                return true;
            }
        }
    },

    created() {
        this.getPosts();
    }


}
</script>

<style lang='scss'>

</style>