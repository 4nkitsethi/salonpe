<template>
    <WebLayout>
        
   <!--start breadcrumb-->
   <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0"> 
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:;">Authentication</a></li>
          <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
      </nav>
    </div>
   </div>
   <!--end breadcrumb-->


   <!--start product details-->
   <section class="section-padding">
    <div class="container">
      
        <div class="row">
          <div class="col-12 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
             <div class="card rounded-0">
               <div class="card-body p-4">
                 <h4 class="mb-0 fw-bold text-center">User Login</h4>
                 <hr>
                 <p class="mb-2">Join / Sign In using</p>
                 <div class="social-login mb-4">
                  <div class="row g-4">
                    <div class="col-xl-6">
                        <button type="button" class="btn bg-facebook btn-ecomm w-100 text-white"><i class="bi bi-facebook me-2"></i>Facebook</button>
                    </div>
                    <div class="col-xl-6">
                      <button type="button" class="btn bg-pinterest btn-ecomm w-100 text-white"><i class="bi bi-google me-2"></i>Google</button>
                  </div>
                   </div>
                 </div>
                 <div class="separator mb-4">
                  <div class="line"></div>
                  <p class="mb-0 fw-bold">Or</p>
                  <div class="line"></div>
                </div>
                 <form>
                    <div class="row g-4">
                      <div class="col-12">
                          <label for="exampleUsername" class="form-label">Username</label>
                          <input type="text" class="form-control rounded-0" id="exampleUsername">
                      </div>
                      <div class="col-12">
                        <label for="examplePassword" class="form-label">Password</label>
                        <input type="text" class="form-control rounded-0" id="examplePassword">
                      </div>
                      <div class="col-12">
                        <a href="javascript:;" class="text-content btn bg-light rounded-0 w-100"><i class="bi bi-lock me-2"></i>Forgot Password</a>
                      </div>
                     <div class="col-12">
                       <hr class="my-0">
                     </div>
                      <div class="col-12">
                        <button type="button" class="btn btn-dark rounded-0 btn-ecomm w-100">Login</button>
                      </div>
                      <div class="col-12 text-center">
                        <p class="mb-0 rounded-0 w-100">Don't have an account? <a href="javascript:;" class="text-danger">Sign Up</a></p>
                      </div>
                    </div><!---end row-->
                 </form>
               </div>
             </div>
          </div>
        </div><!--end row-->
       
    </div>
  </section>
   <!--start product details-->
    </WebLayout>
</template>

<script>
import WebLayout from '@/Layouts/WebLayout.vue';
export default {	
    components:{
        WebLayout
    },
    mounted(){
        // 
        $('.loader-wrapper').fadeOut(1000);
    }
}
</script>