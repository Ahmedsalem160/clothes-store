<template>

        <!--
        <h1>Title App</h1>
        <p>discription</p>
        <p>email</p>
        <p>Youtube</p>
        <p>Logo</p>
         -->
        <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
        <!-- <font-awesome-icon icon="fa-solid fa-user-secret" />String Syntax -->
        <a href="" class="me-4 text-reset">
            <!-- <i class="fa fa-paper-plane" aria-hidden="true"></i> -->
            <font-awesome-icon :icon="['fas', 'paper-plane']" aria-hidden="true" />
      </a>
      <a href="" class="me-4 text-reset">
        <font-awesome-icon :icon="['fab', 'facebook']" /> <!--Array Syntax-->
      </a>
      <a href="" class="me-4 text-reset">
        <font-awesome-icon icon="fa-brands fa-twitter" />
      </a>
      <a href="" class="me-4 text-reset">
        <font-awesome-icon :icon="['fab', 'google']" /> <!--Array Syntax-->
      </a>
      <a href="" class="me-4 text-reset">
        <font-awesome-icon :icon="['fab', 'instagram']" /> <!--Array Syntax-->
      </a>
      <a href="" class="me-4 text-reset">
        <font-awesome-icon :icon="['fab', 'linkedin']" /> <!--Array Syntax-->
      </a>
      <a href="" class="me-4 text-reset">
        <font-awesome-icon :icon="['fab', 'github']" /> <!--Array Syntax-->
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <!-- <i class="fas fa-gem me-3"></i> -->Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><font-awesome-icon :icon="['fas', 'house']" /> New York, NY 10012, US</p>
          <p>

            <font-awesome-icon :icon="['fas', 'envelope']"/>
            info@example.com
          </p>
          <p>
            <font-awesome-icon :icon="['fas', 'phone']" />
             + 01 234 567 88</p>
          <p>
            <font-awesome-icon :icon="['fas', 'print']" />
             + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</template>


<script>
export default {
    name:'FooterComponent',
    data(){
        return{
            title:'',
            discription:'',
            phone:'',
            email:'',
            youtube:'',
            logo:'',
            facebook:'',
        }
    },
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
