<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Product Type</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveProdductType">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Product Type Name ..." v-model="form.productType.name"/>
                    </div>                  

                    <div class="text-end">
                        <inertia-link :href="route('product-type.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
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
	data() {
		return {
                 form : {
                            productType : this.$inertia.form({
                                                            name : null
                            })
                 }     
		}
	},
    methods:{
                saveProdductType(){                    
                            this.form.productType.post(this.route('product-type.store'));                            
                }
    },
    components:{
        AuthenticatedLayout
    }
}
</script>