<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Update Attribute Detail</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveAttribute">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Attribute Name ..." v-model="form.attribute.name"/>
                    </div>                  

                    <div class="text-end">
                        <inertia-link :href="route('attribute.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
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
    props:['attribute'],
	data() {
		return {
                 form : {
                    attribute : this.$inertia.form({
                                                            name : this.attribute.name,
                            })
                 }     
		}
	},
    methods:{
                saveAttribute(){                    
                            this.form.attribute.patch(this.route('attribute.update',this.attribute.id));                            
                }
    },
    components:{
        AuthenticatedLayout
    }
}
</script>