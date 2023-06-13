<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Banner</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveBanner" class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">                        
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Banner Title ..." v-model="form.banner.title"/>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">                        
                                <label class="form-label">Heading</label>
                                <input type="text" class="form-control" placeholder="Banner Heading ..." v-model="form.banner.heading"/>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">                        
                                <label class="form-label">Link</label>
                                <input type="text" class="form-control" placeholder="Banner Link ..." v-model="form.banner.link"/>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3" >
                                <label  class="form-label">Banner Image</label>
                                <div class="input-field">
                                    <div class="banner-images"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label class="form-label">Description</label>
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.banner.description" :contentType="'html'"/>
                            </div>
                        </div>
                    </div>
                    

                   
                    
                    

                    <div class="text-end">
                        <inertia-link :href="route('banner.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                        <button type="submit" class="btn btn-primary">Save  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {forEach } from 'lodash'
export default {
	data() {
		return {
                 form : {
                            banner : this.$inertia.form({
                                                            title : null,
                                                            heading: null,
                                                            link:null,
                                                            description :null,
                                                            images : [],
                            })
                 }     
		}
	},
    methods:{
                saveBanner(){                   ;
                            this.form.banner.post(this.route('banner.store'));                            
                },
                fileChange(e){ 
                    //                     
                    this.form.banner.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.banner.images.push(file);
                    }) 
                } ,
    },
    mounted(){
        $('.banner-images').imageUploader({                
            maxSize: 2 * 1024 * 1024,
            maxFiles: 1
        });
        //
        document.querySelector('[type="file"]').addEventListener('change', this.fileChange, false);
    },
    components:{
        AuthenticatedLayout
    }
}
</script>