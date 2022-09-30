<template>
    <section class="container">
            <LoaderComponent v-if="isLoading" />
            <div v-else class="row justify-content-around">
                <div class="card col-5 mb-3 px-0"  v-for="tag in tags" :key="tag.id">
                    <div class="card-header">
                            #{{tag.name}}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li v-for="post in tag.posts" :key="post.id" class="list-group-item">
                            <router-link :to="'/posts/' + post.id" class="text-dark">
                                {{post.title}}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
    </section>
</template>

<script>
import axios from 'axios'
import LoaderComponent from '../components/LoaderComponent.vue'
export default {
    name: "TagsPage",
    components: {
        LoaderComponent,
    },
    data: function () {
        return {
            tags: [],
            isLoading: true,
        };
    },
    methods: {
        getTags(){
            axios.get('/api/tags')
                .then(response => {
                this.tags = response.data.results.data;
                this.isLoading = false;
            })
                .catch(error => {
                console.log(error);
            });
        }
    },
    created() {
        this.getTags();
    },
}
</script>
<style>
</style>