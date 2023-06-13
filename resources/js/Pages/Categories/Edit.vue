<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-tree-structure me-1"></i> Update Category Detail</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveCategory">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Brand Name ..." v-model="form.category.name"/>
                    </div>                

                    <div class="text-end">
                        <inertia-link :href="route('category.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
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
    props:['category'],
	data() {
		return {
                 form : {
                            category : this.$inertia.form({
                                                            name : this.category.name
                            })
                 }     
		}
	},
    methods:{
                saveCategory(){                    
                            this.form.category.patch(this.route('category.update',this.category.id));                            
                }
    },
    components:{
        AuthenticatedLayout
    },
    mounted(){
        console.log(this.category)
    }
}
</script>