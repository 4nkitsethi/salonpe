<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-tree-structure me-1"></i>Sub Category</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveBrand">

                    <div class="mb-3">
                        <label class="form-label">Category:</label>
                        <multiselect v-model="form.category.parent_id" :options="categories" :multiple="false"  placeholder="Type to search type" track-by="name" label="name" :searchable="true"></multiselect>    
                    </div>    


                    <div class="mb-3">
                        <label class="form-label">Sub Category:</label>
                        <input type="text" class="form-control" placeholder="Brand Name ..." v-model="form.category.name"/>
                    </div>               

                    <div class="text-end">
                        <inertia-link :href="route('sub.category.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                        <button type="submit" class="btn btn-primary">Save  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Multiselect from 'vue-multiselect'

export default {
    props : ["categories"],
	data() {
		return {
                 form : {
                            category : this.$inertia.form({
                                                            parent_id : null,
                                                            name : null
                            })
                 }     
		}
	},
    methods:{
                saveBrand(){                    
                            this.form.category.post(this.route('sub.category.store'));                            
                }
    },
    components:{
        AuthenticatedLayout,
        Multiselect
    }
}
</script>