<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-tree-structure me-1"></i> Category</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveBrand">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Brand Name ..." v-model="form.category.name"/>
                    </div>               

                    <div class="text-end">
                        <inertia-link :href="route('category.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
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
                            category : this.$inertia.form({
                                                            name : null
                            })
                 }     
		}
	},
    methods:{
                saveBrand(){                    
                            this.form.category.post(this.route('category.store'));                            
                }
    },
    components:{
        AuthenticatedLayout
    }
}
</script>