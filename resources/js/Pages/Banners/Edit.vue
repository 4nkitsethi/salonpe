<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Update Banner Detail</h5>
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
                        <button type="submit" class="btn btn-primary">Update  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { isEmpty , forEach } from 'lodash';

export default {
    props:['banner'],
	data() {
		return {
                 form : {
                    banner : this.$inertia.form({
                                                            title : this.banner.title,
                                                            heading: this.banner.heading,
                                                            link:this.banner.link,
                                                            description :this.banner.description,
                                                            images : [],
                                                            _method: 'put',
                                                            deletedAttrImg : [],
                            })
                 }     
		}
	},
    methods:{
                saveBanner  (){                    
                            this.form.banner.post(this.route('banner.update',this.banner.id));                            
                },
                fileChange(e){ 
                    // 
                    this.form.banner.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.banner.images.push(file);
                    }) 
                },
                bannerFileRemove(e){
                    const src = e.srcElement.parentElement.parentElement.querySelector("img");
                    const id = e.srcElement.parentElement.parentElement.querySelector("input");
                    this.form.banner.deletedAttrImg.push({ path : src.getAttribute("src") , id : id.getAttribute("value") });
                } 
    },
    components:{
        AuthenticatedLayout
    },
    mounted(){
        $('.banner-images').imageUploader({                
            maxSize: 2 * 1024 * 1024,
            maxFiles: 1,
            preloaded: ((this.banner.image == '/storage/')) ? [] : [{ id:1,src:this.banner.image}]
        });        
        //
        document.querySelector('.banner-images [type="file"]').addEventListener('change', this.fileChange, false);
        let bannerPreLoadedImage = document.getElementsByClassName('iui-close');
        for (var i = 0; i < bannerPreLoadedImage.length; i++) {
            bannerPreLoadedImage[i].addEventListener('click', this.bannerFileRemove, false);
        }
    }
}
</script>