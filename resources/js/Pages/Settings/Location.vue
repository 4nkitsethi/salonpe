<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Location Information</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveLocation" class="container">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Title ..." v-model="form.location.title"/>
                            </div>  
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label class="form-label">First Phone</label>
                                <input type="text" class="form-control" placeholder="Phone ..." v-model="form.location.firstPhone"/>
                            </div>  
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label">First Address</label>
                                <input type="text" class="form-control" placeholder="Address ..." v-model="form.location.firstAddress"/>
                            </div>  
                        </div>                        
                    </div>    
                    
                    <hr />

                    <div class="row">

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Second Phone</label>
                                <input type="text" class="form-control" placeholder="Phone ..." v-model="form.location.secondPhone"/>
                            </div>  
                        </div>

                        <div class="col-8">
                            <div class="form-group mb-3">
                                <label class="form-label">Second Address</label>
                                <input type="text" class="form-control" placeholder="Address ..." v-model="form.location.secondAddress"/>
                            </div>  
                        </div>                        
                    </div>    


                    <hr />

                    <div class="row">

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Third Phone</label>
                                <input type="text" class="form-control" placeholder="Phone ..." v-model="form.location.thirdPhone"/>
                            </div>  
                        </div>

                        <div class="col-8">
                            <div class="form-group mb-3">
                                <label class="form-label">Third Address</label>
                                <input type="text" class="form-control" placeholder="Address ..." v-model="form.location.thirdAddress"/>
                            </div>  
                        </div>                        
                    </div>    


                    <div class="text-end">
                        <inertia-link :href="route('setting.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                        <button type="submit" class="btn btn-primary">Save  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
export default {
    props:["location"],
	data() {
		return {
                 form : {
                            location : this.$inertia.form({
                                                            title : this.location.data.title,
                                                            firstAddress : this.location.data.firstAddress,
                                                            firstPhone : this.location.data.firstPhone,
                                                            secondAddress : this.location.data.secondAddress,
                                                            secondPhone : this.location.data.secondPhone,
                                                            thirdAddress : this.location.data.thirdAddress,
                                                            thirdPhone : this.location.data.thirdPhone,
                            })
                 }     
		}
	},
    methods:{
                saveLocation(){                    
                            this.form.location.post(this.route('setting.store.type','location'));                            
                }
    },
    components:{
        AuthenticatedLayout
    }
}
</script>