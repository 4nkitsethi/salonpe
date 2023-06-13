<template>
    <AuthenticatedLayout>
        <div class="content">
            <!-- Widgets list -->
            <div class="row justify-content-center">
                <div class="col-5">
                    <!-- User details (with sample pattern) -->
                    <div class="card">
                        <div class="card-body bg-primary text-white text-center d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Location</h6>	
                            <inertia-link :href="route('setting.edit.type','location')" class="text-white"><i class="ph-pencil"></i></inertia-link>								
                        </div>
                        
                        <div class="card-body border-top-0" style="max-height: 21.6em; overflow: auto;">
                            <div class="d-sm-flex flex-sm-wrap mb-3" >
                                <div class="fw-semibold">Title</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ location.data.title }}</div>
                            </div>

                            <hr />

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">First Address</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ location.data.firstAddress }}</div>
                                <br />
                                <label class="form-label me-2">Contact</label>  {{ location.data.firstPhone }}
                            </div>

                            <hr />

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Second Address</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ location.data.secondAddress }}</div>
                                <br />
                                <label class="form-label me-2">Contact</label>  {{ location.data.secondPhone }}
                            </div>

                            <hr />

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Third Address</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ location.data.thirdAddress }}</div>
                                <br />
                                <label class="form-label me-2">Contact</label>  {{ location.data.thirdPhone }}
                            </div>
                        </div>
                    </div>
                    <!-- /user details (with sample pattern) -->
                </div>

                <div class="col-5">
                    <!-- User details (with sample pattern) -->
                    <div class="card">
                        <div class="card-body bg-primary text-white text-center d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Contacts</h6>	
                            <inertia-link :href="route('setting.edit.type','contact')" class="text-white"><i class="ph-pencil"></i></inertia-link>								
                        </div>

                        <div class="card-body border-top-0" style="max-height: 21.6em; overflow: auto;">

                            <div>
                                <label class="form-label">Head Office</label>
                                <p>{{ contact.data.headOfficeAddress}}</p>
                            </div>

                            <hr />


                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Heading</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ contact.data.heading}}</div>
                            </div>

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Title</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ contact.data.title }}</div>
                            </div>

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Email</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{ contact.data.email}}</div>
                            </div>

                            <div class="d-sm-flex flex-sm-wrap">
                                <div class="fw-semibold">Phone Number</div>
                                <div class="ms-sm-auto mt-1 mt-sm-0">{{  contact.data.phone  }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- /user details (with sample pattern) -->
                </div>

                <div class="col-10">
                    <!-- User details (with sample pattern) -->
                    <div class="card">
                        <div class="card-body bg-primary text-white text-center d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Website Setting</h6>	
                            <inertia-link :href="route('setting.edit.type','website')" class="text-white"><i class="ph-pencil"></i></inertia-link>								
                        </div>

                        <div class="card-body border-top-0">
                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Instagram</div>
                                <a :href="website.data.instagram" target="_blank" class="ms-sm-auto mt-1 mt-sm-0">{{  website.data.instagram }}</a>
                            </div>

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Facebook</div>
                                <a :href="website.data.facebook" target="_blank" class="ms-sm-auto mt-1 mt-sm-0">{{ website.data.facebook }}</a>
                            </div>

                            <div class="d-sm-flex flex-sm-wrap mb-3">
                                <div class="fw-semibold">Mail</div>
                                <a :href="website.data.mail" target="_blank" class="ms-sm-auto mt-1 mt-sm-0">{{ website.data.mail }}</a>
                            </div>

                            <hr />

                            <div>
                                <h5>Footer Text</h5>
                                <p v-html="website.data.footerText"></p>                       
                            </div>

                            <hr />
                            
                            <div>
                                <h5>Blog Text</h5>
                                <p v-html="website.data.blogText"></p>                       
                            </div>
                        </div>
                    </div>
                    <!-- /user details (with sample pattern) -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

    export default{
        props : ["location","contact","website"],
        components:{
            AuthenticatedLayout
        }
    }

</script>