<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Update Product Type Detail</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveProductType">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Product Type Name ..." v-model="form.productType.name"/>
                    </div>                  

                    <div class="text-end">
                        <inertia-link :href="route('product-type.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                        <button type="submit" class="btn btn-primary">Update  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
export default {
    props:['productType'],
	data() {
		return {
                 form : {
                            productType : this.$inertia.form({
                                                            name : this.productType.name,
                            })
                 }     
		}
	},
    methods:{
                saveProductType(){                    
                            this.form.productType.patch(this.route('product-type.update',this.productType.id));                            
                }
    },
    components:{
        AuthenticatedLayout
    }
}
</script>