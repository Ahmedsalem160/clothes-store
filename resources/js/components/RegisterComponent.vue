<template>

        <h1>Register Page</h1>

</template>

<script>
export default {
    name:'LoginComponent',
    methods:{
        showAlert(msg){
            // Use sweetalert2
            this.$swal(msg);
        },

    }
}
</script>
