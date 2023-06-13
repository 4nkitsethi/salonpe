<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Products</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveProduct" class="container-fluid">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Product Name ..." v-model="form.product.name"/>
                            </div>
                        </div>       

                        <div class="col-4">
                            <div class="form-group  mb-3">
                                <label class="form-label">Product Type</label>                        
                                <multiselect v-model="form.product.productType" :options="productTypes" :multiple="true"  placeholder="Type to search type" track-by="name" label="name"></multiselect>    
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group  mb-3">
                                <label class="form-label">Category</label>                        
                                <multiselect v-model="form.product.category" :options="categories"  group-values="sub_categories" group-label="name"  :group-select="false" placeholder="Type to search category" track-by="name" label="name"><span slot="noResult">Oops! No category found. Consider changing the search query.</span></multiselect>    
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group  mb-3">
                                <label class="form-label">Brand</label>                        
                                <multiselect v-model="form.product.brand" :options="brands"  :group-select="false" placeholder="Type to search brand" track-by="name" label="name"></multiselect>    
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group mb-3" >
                                <label  class="form-label">Product Image</label>
                                <div class="input-field">
                                    <div class="input-images"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group  mb-3">
                                <label class="form-label">Skin type</label>  
                                <multiselect v-model="form.product.skinType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="name" :options="options" :multiple="true" :taggable="true" @tag="addSkinTypeTag"></multiselect>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group  mb-3">
                                <label class="form-label">Hair type</label>  
                                <multiselect v-model="form.product.hairType" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="name" :options="options" :multiple="true" :taggable="true" @tag="addHairTypeTag"></multiselect>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="form-group  mb-3">
                                <label class="form-label">Product Description</label>                        
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.product.description" :contentType="'html'"/>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group  mb-3">
                                <label class="form-label">Product Ingredients</label>                        
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.product.ingredients" :contentType="'html'"/>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group  mb-3">
                                <label class="form-label">How To Use</label>                        
                                <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.product.howToUse" :contentType="'html'"/>
                            </div>
                        </div>              

                        <div class="text-end col-12 py-4">                        
                            <inertia-link :href="route('product.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                            <button type="submit" class="btn btn-primary">Save  <i class="ph-paper-plane-tilt ms-2"></i></button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Multiselect from 'vue-multiselect'
import {forEach} from 'lodash';

export default {
    props:['categories','productTypes','brands','tags'],
	data() {
		return {                
                form : {
                            product : this.$inertia.form({
                                                            name : null,
                                                            category : null,
                                                            productType : null,
                                                            brand : null, 
                                                            description:null,
                                                            ingredients:null,
                                                            skinType:[],
                                                            customSkinType:[],
                                                            hairType:[],
                                                            customHairType:[],
                                                            howToUse:null,
                                                            images : [],
                            })
                 } ,
                 options : this.tags    
		}
	},
    methods:{
                saveProduct(){                                              
                            this.form.product.post(this.route('product.store'));                            
                },
                nameWithLang ({ name, created_at }) {
                       return `${name}`
                },
                fileChange(e){ 
                    // 
                    this.form.product.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.product.images.push(file);
                    }) 
                } ,
                addSkinTypeTag (newTag) {
                    this.form.product.skinType.push({ id : 0 , name : newTag });
                    this.options.push({ id : 0 , name : newTag });
                } ,
                addHairTypeTag (newTag) {
                    this.form.product.hairType.push({id : 0 , name : newTag});
                    this.options.push({ id : 0 , name : newTag });
                } 
    },
    mounted(){
        $('.input-images').imageUploader({                
            maxSize: 2 * 1024 * 1024,
            maxFiles: 1
        });
        //
        document.querySelector('[type="file"]').addEventListener('change', this.fileChange, false);
    },
    components:{
        AuthenticatedLayout,
        Multiselect
    }
}
</script>