<template>
    <DashboardLayout>

                    <div class="card rounded-0">
                    <div class="card-header bg-light">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                            <h5 class="fw-bold mb-0">Saved Address</h5>
                            </div>
                            <div class="">
                            <button type="button" class="btn btn-ecomm" data-bs-toggle="modal" data-bs-target="#NewAddress"><i class="bi bi-plus-lg me-2"></i>Add New Address</button> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Default Address</h6>
                        <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-xl-row gap-3">
                            <div class="address-info form-check flex-grow-1">
                                <input class="form-check-input" type="radio" name="flexRadioDefaultAddress" id="flexRadioDefaultAddress1" checked>
                                <label class="form-check-label" for="flexRadioDefaultAddress1">
                                <span class="fw-bold mb-0 h5">Jhon Maxwell</span><br>
                                47-A, US Road, New York <br>
                                United Kingdom, 201001<br>
                                Mobile: <span class="text-dark fw-bold">+91-xxxxxxxxxx</span>
                            </label>
                            </div>
                            <div class="d-none d-xl-block vr"></div>
                            <div class="d-grid gap-2 align-self-start align-self-xl-center">
                                <button type="button" class="btn btn-outline-dark px-5 btn-ecomm">Remove</button>
                                <button type="button" class="btn btn-outline-dark px-5 btn-ecomm" data-bs-toggle="modal" data-bs-target="#EditAddress">Edit</button> 
                            </div>
                            </div>
                        </div>
                        </div> 
            
                        <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Other Address</h6>
                        <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-xl-row gap-3">
                            <div class="address-info form-check flex-grow-1">
                                <input class="form-check-input" type="radio" name="flexRadioDefaultAddress" id="flexRadioDefaultAddress2">
                                <label class="form-check-label" for="flexRadioDefaultAddress2">
                                <span class="fw-bold mb-0 h5">Andrew Clark</span><br>
                                85-B, UAE Road, Dubai <br>
                                Saudi Arabia, 201001<br>
                                Mobile: <span class="text-dark fw-bold">+99-xxxxxxxxxx</span>
                            </label>
                            </div>
                            <div class="d-none d-xl-block vr"></div>
                            <div class="d-grid gap-2 align-self-start align-self-xl-center">
                                <button type="button" class="btn btn-outline-dark px-5 btn-ecomm">Remove</button>
                                <button type="button" class="btn btn-outline-dark px-5 btn-ecomm" data-bs-toggle="modal" data-bs-target="#EditAddress">Edit</button> 
                            </div>
                            </div>
                        </div>
                        </div> 
            
                        <div class="card rounded-0">
                        <div class="card-body">
                            <button type="button" class="btn btn-outline-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#NewAddress">Add New Address</button> 
                        </div>
                        </div> 
                    </div>
                    </div>


        <!-- filter Modal -->
            <div class="modal" id="FilterOrders" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Filter Orders</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="mb-3 fw-bold">Status</h6>
                    <div class="status-radio d-flex flex-column gap-2">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            All 
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            On the way
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Delivered
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            Cancelled
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                        <label class="form-check-label" for="flexRadioDefault5">
                            Returned
                        </label>
                        </div>
                    </div>
                    <hr>
                    <h6 class="mb-3 fw-bold">Time</h6>
                    <div class="status-radio d-flex flex-column gap-2">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioTime" id="flexRadioDefault6" checked>
                        <label class="form-check-label" for="flexRadioDefault6">
                            Anytime 
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioTime" id="flexRadioDefault7">
                        <label class="form-check-label" for="flexRadioDefault7">
                            Last 30 days
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioTime" id="flexRadioDefault8">
                        <label class="form-check-label" for="flexRadioDefault8">
                            Last 6 months
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioTime" id="flexRadioDefault9">
                        <label class="form-check-label" for="flexRadioDefault9">
                            Last year
                        </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="d-flex align-items-center gap-3 w-100">
                    <button type="button" class="btn btn-outline-dark btn-ecomm w-50">Clear Filters</button>
                    <button type="button" class="btn btn-dark btn-ecomm w-50">Apply</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- end Filters Modal -->


            
<!-- New Address Modal -->
<div class="modal" id="NewAddress" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Add New Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="">
           <h6 class="fw-bold mb-3">Contact Details</h6>
           <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-0" id="floatingName" placeholder="Name">
            <label for="floatingName">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-0" id="floatingMobileNo" placeholder="Mobile No">
            <label for="floatingMobileNo">Mobile No</label>
          </div>
         </div>

         <div class="mt-4">
          <h6 class="fw-bold mb-3">Address</h6>
          <div class="form-floating mb-3">
           <input type="text" class="form-control rounded-0" id="floatingPinCode" placeholder="Pin Code">
           <label for="floatingPinCode">Pin Code</label>
         </div>
         <div class="form-floating mb-3">
           <input type="text" class="form-control rounded-0" id="floatingAddress" placeholder="Address (House No, Building, Street, Area)">
           <label for="floatingAddress">Address</label>
         </div>
         <div class="form-floating mb-3">
          <input type="text" class="form-control rounded-0" id="floatingLocalityTown" placeholder="Locality/Town">
          <label for="floatingLocalityTown">Locality / Town</label>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating">
              <input type="text" class="form-control rounded-0" id="floatingCity" placeholder="City / District">
              <label for="floatingAddress">City / District</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating">
              <input type="text" class="form-control rounded-0" id="floatingState" placeholder="State">
              <label for="floatingState">State</label>
            </div>
          </div>
         </div>
        </div>

      </div>
      <div class="modal-footer">
        <div class="d-grid w-100">
          <button type="button" class="btn btn-dark py-3 px-5 btn-ecomm">Add Address</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end New Address Modal -->




<!-- Edit Address Modal -->
<div class="modal" id="EditAddress" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Edit Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="">
           <h6 class="fw-bold mb-3">Contact Details</h6>
           <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-0" id="floatingName2" placeholder="Name" value="Jhon Deo">
            <label for="floatingName2">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-0" id="floatingMobileNo2" placeholder="Mobile No" value="99-xxxxxxxxxx">
            <label for="floatingMobileNo2">Mobile No</label>
          </div>
         </div>

         <div class="mt-4">
          <h6 class="fw-bold mb-3">Address</h6>
          <div class="form-floating mb-3">
           <input type="text" class="form-control rounded-0" id="floatingPinCode2" placeholder="Pin Code" value="201001">
           <label for="floatingPinCode2">Pin Code</label>
         </div>
         <div class="form-floating mb-3">
           <input type="text" class="form-control rounded-0" id="floatingAddress2" placeholder="Address (House No, Building, Street, Area)" value="85-B, UAE Road">
           <label for="floatingAddress2">Address</label>
         </div>
         <div class="form-floating mb-3">
          <input type="text" class="form-control rounded-0" id="floatingLocalityTown2" placeholder="Locality/Town" value="Street Name">
          <label for="floatingLocalityTown2">Locality / Town</label>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating">
              <input type="text" class="form-control rounded-0" id="floatingCity2" placeholder="City / District" value="Dubai">
              <label for="floatingAddress2">City / District</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating">
              <input type="text" class="form-control rounded-0" id="floatingState2" placeholder="State" value="United Arabia">
              <label for="floatingState2">State</label>
            </div>
          </div>
         </div>
        </div>

      </div>
      <div class="modal-footer">
        <div class="d-grid w-100">
          <button type="button" class="btn btn-dark py-3 px-5 btn-ecomm">Save Address</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Edit Address Modal -->
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '@/Pages/Web/DashboardLayout.vue';
export default {	
    components:{
        DashboardLayout
    },
    mounted(){
        // 
        $('.loader-wrapper').fadeOut(1000);
    }
}
</script>