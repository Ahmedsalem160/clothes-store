<template>

        <h1>Login Page</h1>
        <button type="button" @click="updateAlert">Click Me >> Alert You</button>

</template>


<script>
export default {
    name:'LoginComponent',
    methods:{
        showAlert(msg){
            // Use sweetalert2
            this.$swal(msg);
        },
        updateAlert(){
            if(true){
                this.showAlert('Hi form Another function');
            }
        }
    }
}
</script>
