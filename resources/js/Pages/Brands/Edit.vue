<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Update Brand Detail</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveBrand">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Brand Name ..." v-model="form.brand.name"/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <QuillEditor :toolbar="$page.props.quillToolbar" v-model:content="form.brand.description" :contentType="'html'"/>
                    </div>                    

                    <div class="text-end">
                        <inertia-link :href="route('brand.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
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
    props:['brand'],
	data() {
		return {
                 form : {
                            brand : this.$inertia.form({
                                                            name : this.brand.name,
                                                            description : this.brand.description
                            })
                 }     
		}
	},
    methods:{
                saveBrand(){                    
                            this.form.brand.patch(this.route('brand.update',this.brand.id));                            
                }
    },
    components:{
        AuthenticatedLayout
    },
    mounted(){
        console.log(this.brand)
    }
}
</script>