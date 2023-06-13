<template>
    <AuthenticatedLayout>
        <!-- My messages -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="mb-0">Product Detail</h5>
            </div>
            <!-- Tabs -->
            <ul class="nav nav-tabs nav-tabs-underline nav-justified bg-primary bg-opacity-10">                

                <li class="nav-item">
                    <a href="#productAttributes" class="nav-link active fw-bold" data-bs-toggle="tab">
                        Product Attributes
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#productDetail" class="nav-link  fw-bold" data-bs-toggle="tab">
                        Product Detail
                    </a>
                </li>
            </ul>
            <!-- /tabs -->


            <!-- Tabs content -->
            <div class="tab-content card-body p-0">
                <div class="tab-pane fade" id="productDetail">
                    <form @submit.prevent="updateProduct" class="container-fluid p-4">
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
                                    <multiselect v-model="form.product.productType" :options="productTypes" :multiple="true"  placeholder="Type to search type" track-by="name" label="name" :searchable="false"></multiselect>    
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-group  mb-3">
                                    <label class="form-label">Category</label>                        
                                    <multiselect v-model="form.product.category" value="Integer" :options="categories"  group-values="sub_categories" group-label="name"  :group-select="false" placeholder="Type to search category" track-by="name" label="name"><span slot="noResult">Oops! No category found. Consider changing the search query.</span></multiselect>    
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
                                <button type="submit" class="btn btn-primary">Update Details  <i class="ph-paper-plane-tilt ms-2"></i></button>
                            </div>
                        </div>  
                    </form>
                </div>

                <div class="tab-pane fade active show" id="productAttributes">   
                                    
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Attribute</th>
                                <th>Attribute Images</th>
                                <th>Quantity</th>
                                <th width="180">
                                    <inertia-link :href="route('create.product.attribute',this.product.id)" class="btn btn-primary btn-sm">
                                        <i class="ph-plus-circle me-1"></i>
                                        Add Attribute
                                    </inertia-link>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="attribute in product.attributes" :key="attribute.id">
                                <td><kbd>{{ attribute.id }}</kbd></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a href="#" class="text-body fw-semibold letter-icon-title">{{ attribute.attribute_data.name }}</a>
                                            <div class="d-flex align-items-center text-muted fs-sm">
                                                <span class="rounded-pill p-1 me-2" :style="{background:attribute.attribute_data.color}"></span>
                                                {{attribute.attribute_data.size}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>                                    
                                    <div class="d-flex align-items-center">
                                        <div class="d-inline-block me-1" v-for="media in attribute.media" :key="media.id">
                                            <img :src="media.path" class="rounded-circle" width="40" height="40" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{  attribute.quantity }}
                                </td>
                                <td class="text-center"><inertia-link :href="route('edit.product.attribute',attribute.id)" class="fw-bold"><i class="ph-caret-right fw-bold"></i></inertia-link></td>
                            </tr>                           
                        </tbody>
                   </table>
                </div>
            </div>
            <!-- /tabs content -->

        </div>
        <!-- /my messages -->
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FileUpload from 'primevue/fileupload';
import Multiselect from 'vue-multiselect'
import Uploader from "vue-media-upload";
import {forEach, includes, isEmpty} from 'lodash';

export default {    
    props:['categories','productTypes','brands','product','tags'],
	data() {
		return {
                 includes,
                 form : {
                            product : this.$inertia.form({
                                                            name : this.product.name,
                                                            category : this.product.category,
                                                            productType : this.product.product_type,
                                                            brand : this.product.brand, 
                                                            description:this.product.product_description,
                                                            ingredients:this.product.ingredients,
                                                            skinType:this.product.skin_type,
                                                            hairType:this.product.hair_type,
                                                            howToUse:this.product.how_to_use,
                                                            images : [],
                                                            _method: 'put',
                                                            deletedAttrImg : [],
                            }),
                            productAttribute : this.$inertia.form({
                                                                     product : this.product.id,
                                                                     attributes : [],
                                                                     images : [],
                            })
                 },
                 options : this.tags    
		}
	},
    methods:{
                updateProduct(e){                                          
                 //   this.$inertia.post(this.route('product.update',this.product.id) , this.form.product);
                    this.form.product.post(this.route('product.update',this.product.id));                            
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
                },
                attributeFileChange(e){
                    this.form.productAttribute.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.productAttribute.images.push(file);
                    }) 
                },
                addSkinTypeTag (newTag) {
                    this.form.product.skinType.push({ id : 0 , name : newTag });
                    this.options.push({ id : 0 , name : newTag });
                } ,
                addHairTypeTag (newTag) {
                    this.form.product.hairType.push({id : 0 , name : newTag});
                    this.options.push({ id : 0 , name : newTag });
                },
                productFileRemove(e){
                    const src = e.srcElement.parentElement.parentElement.querySelector("img");
                    const id = e.srcElement.parentElement.parentElement.querySelector("input");
                    this.form.product.deletedAttrImg.push({ path : src.getAttribute("src") , id : id.getAttribute("value") });
                }         
    },
    components:{
        AuthenticatedLayout,
        FileUpload,
        Multiselect,
        Uploader
    },
    mounted(){
        $('.input-images').imageUploader({                
            maxSize: 2 * 1024 * 1024,
            maxFiles: 1,
            preloaded: ((this.product.thumb_image == '/storage/')) ? [] : [{ id:1,src:this.product.thumb_image}] 
        });        
        //
        document.querySelector('.input-images [type="file"]').addEventListener('change', this.fileChange, false);
        let attributePreLoadedImage = document.getElementsByClassName('iui-close');
        for (var i = 0; i < attributePreLoadedImage.length; i++) {
            attributePreLoadedImage[i].addEventListener('click', this.productFileRemove, false);
        }
    }
}
</script>