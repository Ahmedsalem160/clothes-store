<template>
    <div class="align-items-center py-4 bg-gray-100 vh-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 px-lg-4">
                    <div class="card">
                        <div class="card-header px-lg-5">
                            <div class="card-heading text-dark text-center">
                                Souq Admin Login
                                <hr v-if="error"/>
                                <p v-if="error" class="text-danger text-center">You are UnAuthorized !!!</p>
                            </div>
                        </div>
                        <div class="card-body p-lg-5">
                            <h3 class="mb-4">Hi, welcome back! ??</h3>
                            <p class="text-muted text-sm mb-5">
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore.
                            </p>
                            <form id="loginForm" action="index.html">
                                <div class="form-floating mb-3">
                                    <input
                                        class="form-control"
                                        id="floatingInput"
                                        type="email"
                                        placeholder="name@example.com"
                                        v-model="user.email"
                                        required
                                    />
                                    <label for="floatingInput"
                                        >Email address</label
                                    >
                                </div>
                                <div class="form-floating mb-3">
                                    <input
                                        class="form-control"
                                        id="floatingPassword"
                                        type="password"
                                        placeholder="Password"
                                        v-model="user.password"
                                        required
                                    />
                                    <label for="floatingPassword"
                                        >Password</label
                                    >
                                </div>
                                <div class="form-check mb-3">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="remember"
                                        >Remember me</label
                                    >
                                </div>
                                <button
                                    class="d-flex flex-row-reverse btn btn-primary"
                                    type="button"
                                    @click="login"
                                >
                                    Log In
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div
                    class="col-lg-6 col-xl-5 ms-xl-auto px-lg-4 text-center text-primary"
                >
                    <img
                        class="img-fluid mb-4"
                        width="300"
                        src="https://therichpost.com/wp-content/uploads/2021/06/login_page_image.png"
                        alt=""
                        style="transform: rotate(10deg)"
                    />
                    <h1 class="mb-4">
                        Therichpost.com <br class="d-none d-lg-inline" />free
                        code snippets.
                    </h1>
                    <p class="lead text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor incididunt ut labore.
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//importing bootstrap 5 Modules
// import "bootstrap/dist/css/bootstrap.min.css";
export default {
    name: "LoginView",
    methods: {
        //user login button click event
        login() {
            axios.post("admin/login", this.user).then((response) => {

                if (response.data.status == false) {
                    this.error=true;
                    console.log(response.data.status);
                } else {
                    this.error=false;
                    console.log(response.data.token);
                    localStorage.setItem('token', response.data.token);
                    console.log(response.data);
                    console.log(response.data.msg);
                }
            });
        },
    },
    data: function () {
        return {
            error:false,
            user: {
                email: "",
                password: "",
            },
        };
    },
};
</script>
<style>
.card-header:first-child {
    border-radius: calc(1rem - 1px) calc(1rem - 1px) 0 0;
}
.card-header {
    position: relative;
    padding: 2rem 2rem;
    border-bottom: none;
    background-color: white;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    z-index: 2;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: none;
    box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);
    border-radius: 1rem;
}
.bg-gray-100 {
    background-color: #f8f9fa !important;
}
body {
    font-family: "Poppins" !important;
}
.text-primary {
    color: #4650dd !important;
}
h1,
.h1,
h2,
.h2,
h3,
.h3,
h4,
.h4,
h5,
.h5,
h6,
.h6 {
    font-weight: 700;
    line-height: 1.2;
}
.text-muted {
    color: #6c757d !important;
}
.lead {
    font-size: 1.125rem;
    font-weight: 300;
}
.text-sm {
    font-size: 0.7875rem !important;
}
h3,
.h3 {
    font-size: 1.575rem;
}
.page-holder {
    display: flex;
    overflow-x: hidden;
    width: 100%;
    min-height: calc(100vh - 72px);

    /* flex-wrap: wrap; */
}
a {
    color: #4650dd !important;
    text-decoration: underline !important;
    cursor: pointer;
}
</style>
