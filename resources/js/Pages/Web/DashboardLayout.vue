<template>
    <WebLayout>
         <!--start breadcrumb-->
   <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0"> 
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>          
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>
   </div>
   <!--end breadcrumb-->


   <!--start product details-->
   <section class="section-padding">
    <div class="container">
      <div class="d-flex align-items-center px-3 py-2 border mb-4">
        <div class="text-start">
          <h4 class="mb-0 h4 fw-bold">Account - Dashboard</h4>
       </div>
      </div>
     <div class="btn btn-dark btn-ecomm d-xl-none position-fixed top-50 start-0 translate-middle-y"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarFilter"><span><i class="bi bi-person me-2"></i>Account</span></div>
       <div class="row">
          <div class="col-12 col-xl-3 filter-column">
              <nav class="navbar navbar-expand-xl flex-wrap p-0">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarFilter" aria-labelledby="offcanvasNavbarFilterLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title mb-0 fw-bold text-uppercase" id="offcanvasNavbarFilterLabel">Account</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body account-menu">
                    <div class="list-group w-100 rounded-0">
                      <inertia-link :href="route('salonpe.account.dashboard')" class="list-group-item" :class="{ 'active': $page.url.startsWith('/account-dashboard') }"><i class="bi bi-house-door me-2"></i>Dashboard</inertia-link>
                      <inertia-link :href="route('salonpe.account.order')"  class="list-group-item" :class="{ 'active': $page.url.startsWith('/account-orders') }"><i class="bi bi-basket3 me-2"></i>Orders</inertia-link>
                      <inertia-link :href="route('salonpe.account.profile')"  class="list-group-item" :class="{ 'active': $page.url == '/account-profile' }"><i class="bi bi-person me-2"></i>Profile</inertia-link>
                      <inertia-link :href="route('salonpe.account.profile.edit')"  class="list-group-item" :class="{ 'active': $page.url == '/account-profile-edit' }"><i class="bi bi-pencil me-2"></i>Edit Profile</inertia-link>
                      <inertia-link :href="route('salonpe.account.save.address')"  class="list-group-item" :class="{ 'active': $page.url.startsWith('/account-save-address') }"><i class="bi bi-pin-map me-2"></i>Saved Address</inertia-link>
                      <inertia-link :href="route('salonpe.wishlist')"  class="list-group-item"><i class="bi bi-suit-heart me-2"></i>Wishlist</inertia-link>
                      <a href="authentication-login.html" class="list-group-item"><i class="bi bi-power me-2"></i>Logout</a>
                    </div>
                  </div>
                </div>
            </nav>
          </div>
          <div class="col-12 col-xl-9">
            <slot />
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