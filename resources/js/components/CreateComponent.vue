<template>
    <div>
        <p>Create</p>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                post:{}
            }
        },
        methods: {
            addPost(){
                console.log(this.post);
            }
        }
    }
</script>
