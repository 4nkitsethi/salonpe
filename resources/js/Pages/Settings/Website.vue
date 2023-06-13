<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Website Information</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveWebsite" class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Instagram</label>
                                <input type="text" class="form-control" placeholder="Instagram ..." v-model="form.website.instagram"/>
                            </div>  
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" placeholder="Facebook ..." v-model="form.website.facebook"/>
                            </div>  
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Mail</label>
                                <input type="text" class="form-control" placeholder="Mail ..." v-model="form.website.mail"/>
                            </div>  
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Footer Text</label>                              
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.website.footerText" :contentType="'html'"/>
                            </div>  
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Blog Text</label>
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.website.blogText" :contentType="'html'"/>
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
    props:["website"],
	data() {
		return {
                 form : {
                            website : this.$inertia.form({
                                                            instagram : this.website.data.instagram,
                                                            facebook : this.website.data.facebook,
                                                            mail : this.website.data.mail,
                                                            footerText : this.website.data.footerText,
                                                            blogText : this.website.data.blogText,
                            })
                 }     
		}
	},
    methods:{
                saveWebsite(){                    
                    this.form.website.post(this.route('setting.store.type','website'));                            
                }
    },
    components:{
        AuthenticatedLayout
    }
}
</script>