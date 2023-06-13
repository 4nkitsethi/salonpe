<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Contact</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveContact" class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Heading</label>
                                <input type="text" class="form-control" placeholder="Heading ..." v-model="form.contact.heading"/>
                            </div>  
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Title ..." v-model="form.contact.title"/>
                            </div>  
                        </div>


                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="E-Mail ..." v-model="form.contact.email"/>
                            </div>  
                        </div>


                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Phone ..." v-model="form.contact.phone"/>
                            </div>  
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Head Office Address</label>
                                <textarea class="form-control" placeholder="Address ..." v-model="form.contact.headOfficeAddress"></textarea>
                            </div>  
                        </div>
                    </div>                                   

                    <div class="text-end mt-3">
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
    props:['contact'],
	data() {
		return {
                 form : {
                            contact : this.$inertia.form({
                                                            title : this.contact.data.title,
                                                            heading : this.contact.data.heading,
                                                            email : this.contact.data.email,
                                                            phone : this.contact.data.phone,
                                                            headOfficeAddress : this.contact.data.headOfficeAddress
                            })
                 }     
		}
	},
    methods:{
                saveContact(){                    
                    this.form.contact.post(this.route('setting.store.type','contact'));                            
                }
    },
    components:{
        AuthenticatedLayout
    }
}
</script>