<template>
    <AuthenticatedLayout>
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="mb-0">Product Attributes</h5>                
            </div>
            <div class="card-body">
                <form class="container" @submit.prevent="saveProductAttribute">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group mb-3" >
                                <label  class="form-label">Attribute Images</label>
                                <div class="input-field">
                                    <div class="attribute-images"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="fw-bold">Product Attributes / Descriptions</span>
                            <hr class="mt-2"/>
                        </div>


                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label class="form-label">Product</label>  
                                <input readonly class="form-control" disabled :value="product.name" />
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Product Attributes</label> 
                                <multiselect v-model="form.productAttribute.attributes" :options="[{attribute:'Attributes',values: ['Name','Size','Color']}]" :multiple="true" group-values="values" group-label="attribute" :group-select="true" placeholder="Type to search"></multiselect>
                            </div>
                        </div>  
                        
                        <div class="col-2" v-if="includes(form.productAttribute.attributes, 'Name')">
                            <div class="form-group mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" placeholder="Name ..." v-model="form.productAttribute.name"/>  
                            </div>
                        </div>

                        <div class="col-2" v-if="includes(form.productAttribute.attributes, 'Size')">
                            <div class="form-group mb-3">
                                <label class="form-label">Size</label>
                                <div class="position-relative zindex-1">
                                    <input type="text" class="form-control pe-5" placeholder="size ..." v-model="form.productAttribute.size">

                                    <div class="position-absolute end-0 top-50 translate-middle-y me-1">
                                        <button type="button" class="btn btn-light btn-sm btn-icon rounded-pill" data-bs-toggle="dropdown">
                                            <i class="ph-caret-down ph-sm"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0)" class="dropdown-item" @click.prevent="form.productAttribute.size = parseInt(form.productAttribute.size) +' ML'">ML</a>
                                            <a href="javascript:void(0)" class="dropdown-item" @click.prevent="form.productAttribute.size = parseInt(form.productAttribute.size) +' MG'"> MG</a>
                                            <a href="javascript:void(0)" class="dropdown-item" @click.prevent="form.productAttribute.size = parseInt(form.productAttribute.size) +' G'"> G</a>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>


                        <div class="col" v-if="includes(form.productAttribute.attributes, 'Color')">
                            <div class="form-group mb-3">
                                <label class="form-label">Color</label>
                                <input type="color" class="form-control" style="height:40px" v-model="form.productAttribute.color"/>  
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group mb-3">  
                                <textarea class="form-control" placeholder="Product Additional Description ...." v-model="form.productAttribute.additional_description"></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <span class="fw-bold">Product Prices / Quantity</span>
                            <hr class="mt-2"/>
                        </div>
                        

                        <div class="col-3">
                            <div class="form-group mb-3">                                    
                                <input v-maska  data-maska="0.99" data-maska-tokens="0:\d:multiple|9:\d:optional" class="form-control" placeholder="MRP ..." v-model="form.productAttribute.mrp"/>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">                                    
                                <input v-maska  data-maska="0.99" data-maska-tokens="0:\d:multiple|9:\d:optional" class="form-control" placeholder="Purchase Price ..." v-model="form.productAttribute.purchase_price"/>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">                                    
                                <input v-maska  data-maska="0.99" data-maska-tokens="0:\d:multiple|9:\d:optional" class="form-control" placeholder="Discounted MRP ..." v-model="form.productAttribute.discounted_mrp"/>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">                                    
                                <input v-maska  data-maska="0.99" data-maska-tokens="0:\d:multiple|9:\d:optional" class="form-control" placeholder="Wholesale Price ..." v-model="form.productAttribute.wholesale_price" />
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group mb-3">                                    
                                <input v-maska  data-maska="0.99" data-maska-tokens="0:\d:multiple|9:\d:optional" class="form-control" placeholder="Franchise Price ..." v-model="form.productAttribute.salon_price" />
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-group mb-3">
                                <input v-maska  data-maska="0.99" data-maska-tokens="0:\d:multiple|9:\d:optional" class="form-control" placeholder="Salon Price ..." v-model="form.productAttribute.salon_price"/>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">                                    
                                <input v-maska  data-maska="0.99" data-maska-tokens="0:\d:multiple|9:\d:optional" class="form-control" placeholder="Tax % ..." v-model="form.productAttribute.tax"/>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group mb-3">
                                <input v-maska  data-maska="#" data-maska-tokens="#:\d:multiple"  class="form-control" placeholder="Quantity ..." v-model="form.productAttribute.quantity"/>
                            </div>
                        </div>
                    </div>                    
                    <hr />
                    <inertia-link :href="route('product.edit',product.id)" class="btn btn-danger me-2 px-5">Return Back</inertia-link>
                    <button type="submit" class="btn btn-primary">Associate Attribute To Product</button>
                </form>
            </div>
        </div>        
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FileUpload from 'primevue/fileupload';
import Multiselect from 'vue-multiselect'
import Uploader from "vue-media-upload";
import {forEach, includes,isEmpty, has , mapKeys} from 'lodash';

export default {    
    props:['product','attribute'],
	data() {
		return {
                 includes,
                 form : {
                            productAttribute : this.$inertia.form({
                                                                    product : this.product.id,
                                                                    attributes : (isEmpty(this.attribute)) ? [] : this.attribute.attribute_type,
                                                                    images : [],
                                                                    name : (isEmpty(this.attribute)) ? null : has(this.attribute.attribute_data,'name')  ? this.attribute.attribute_data.name : null,
                                                                    size : (isEmpty(this.attribute)) ? null : has(this.attribute.attribute_data,'size')  ? this.attribute.attribute_data.size : null,
                                                                    color : (isEmpty(this.attribute)) ? null : has(this.attribute.attribute_data,'color')  ? this.attribute.attribute_data.color : null, 
                                                                    bar_code: null ,
                                                                    hsn_code: null ,
                                                                    ean_code: null ,
                                                                    gst_amount: null ,
                                                                    mrp: (isEmpty(this.attribute)) ? null : this.attribute.mrp ,
                                                                    discounted_mrp: (isEmpty(this.attribute)) ? null : this.attribute.discounted_mrp ,
                                                                    purchase_price: (isEmpty(this.attribute)) ? null : this.attribute.purchase_price ,
                                                                    wholesale_price: (isEmpty(this.attribute)) ? null : this.attribute.wholesale_price ,
                                                                    salon_price: (isEmpty(this.attribute)) ? null : this.attribute.salon_price ,
                                                                    tax: (isEmpty(this.attribute)) ? null : this.attribute.tax ,
                                                                    quantity: (isEmpty(this.attribute)) ? null : this.attribute.quantity ,
                                                                    additional_description: (isEmpty(this.attribute)) ? null : this.attribute.additional_description ,
                                                                    attribute : (isEmpty(this.attribute)) ? null : this.attribute.id,
                                                                    deletedAttrImg : [],

                            })
                 } 
		}
	},
    methods:{
                saveProductAttribute(e){                                 
                        this.form.productAttribute.post(this.route('store.product.attribute',this.product.id));      
                },
                nameWithLang ({ name, created_at }) {
                       return `${name}`
                },
                attributeFileChange(e){
                    this.form.productAttribute.images =  [];
                    forEach(e.target.files, (file) => {
                        this.form.productAttribute.images.push(file);
                    }) 
                },
                attributeFileRemove(e){
                    const src = e.srcElement.parentElement.parentElement.querySelector("img");
                    const id = e.srcElement.parentElement.parentElement.querySelector("input");
                    this.form.productAttribute.deletedAttrImg.push({ path : src.getAttribute("src") , id : id.getAttribute("value") });
                }           
    },
    components:{
        AuthenticatedLayout,
        FileUpload,
        Multiselect,
        Uploader
    },
    mounted(){
        let preloaded = [];
        if(!isEmpty(this.attribute)){
            forEach(this.attribute.media , (item) => {
                preloaded.push(mapKeys(item,(v,k) => { if(k == 'path') return "src"; return k;  }))
            });
        }
        
        
        $('.attribute-images').imageUploader({                
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10,
            preloaded:preloaded
        }); 
        //
        document.querySelector('.attribute-images [type="file"]').addEventListener('change', this.attributeFileChange, false);
        let attributePreLoadedImage = document.getElementsByClassName('iui-close');
        for (var i = 0; i < attributePreLoadedImage.length; i++) {
            attributePreLoadedImage[i].addEventListener('click', this.attributeFileRemove, false);
        }
    }
}
</script>