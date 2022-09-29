<template>
    <div class="card col-5 m-5">       
        <div class="card-body">
        <img :src="isValidUrl(post.image) ? post.image : 'storage/' + post.image" class="card-img-top mt-3" alt="image-post">
            <h5 class="card-title m-3 font-weight-bold">
                <router-link :to="'posts/' + post.id">
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
</template>

<script>
export default {
    props: ['post'],

    methods : {
        isValidUrl(string) {
            const regex = /(?:https?):\/\/(\w+:?\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
            if(!regex .test(string)) {
                return false;
            } else {
                return true;
            }
        }
    }
}
</script>

<style>

</style>