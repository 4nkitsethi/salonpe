<template>
    <DashboardLayout>    
                    <div class="card rounded-0">
                    <div class="card-body p-lg-5">
                        <h5 class="mb-0 fw-bold">Profile Details</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped">
                            <tbody>
                                <tr>
                                <td>Full Name</td>
                                <td>Jhon Deo</td>
                                </tr>
                                <tr>
                                <td>Mobile Number</td>
                                <td>+99-85XXXXXXXX</td>
                                </tr>
                                <tr>
                                <td>Email ID</td>
                                <td>name@example.com</td>
                                </tr>
                                <tr>
                                <td>Gender</td>
                                <td>Male</td>
                                </tr>
                                <tr>
                                <td>DOB</td>
                                <td>10/03/1993</td>
                                </tr>
                                <tr>
                                <td>Location</td>
                                <td>United Kingdom</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-outline-dark btn-ecomm px-5"><i class="bi bi-pencil me-2"></i>Edit</button>
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