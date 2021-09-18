<template>
    <div class="container">
        <button class="btn btn-primary ml-4" @click="follow-user">Follow</button>
        
    </div>
</template>

<script>
    export default {

        props: ['userId'],
        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return{
                status: this.follows,
            }
        },
        methods: {
            followUser(){
                //alert('Follow me!');
                axios.post('/follow', this.userId)
                .then(response=>{
                    this.status = ! this.status;
                    console.log(response.data);
                }).catch(error =>{
                    if(error.response.status== 401){
                        window.location = "/login";
                    }
                })
            }
        },

        computed: {
            buttonText(){
                return (this.status) ? 'unfollow' : 'follow';
            }
        }
    }
</script>
