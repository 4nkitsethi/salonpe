<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Update Tag Detail</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveTag">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Tag Name ..." v-model="form.tag.name"/>
                    </div>    
                    

                    <div class="form-group  mb-3">
                        <label class="form-label">Category</label>                        
                        <multiselect v-model="subCategory" :options="categories"  group-values="sub_categories" group-label="name"  :group-select="false" placeholder="Type to search category" track-by="name" label="name" :multiple="true"><span slot="noResult">Oops! No category found. Consider changing the search query.</span></multiselect>    
                    </div> 
                    

                    <div class="text-end">
                        <inertia-link :href="route('tag.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
                        <button type="submit" class="btn btn-primary">Update  <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>					
    </AuthenticatedLayout>    
</template>


<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Multiselect from 'vue-multiselect'
import { mapValues } from 'lodash'

export default {
    props:['tag',"categories"],
	data() {
		return {
                 form : {
                    tag : this.$inertia.form({
                                                            name : this.tag.name,                                                            
                                                            category:null
                            })
                 },
                 subCategory:this.tag.category,     
		}
	},
    methods:{
                saveTag(){                    
                            this.form.tag.category = mapValues(this.subCategory,'id');
                            this.form.tag.patch(this.route('tag.update',this.tag.id));                            
                }
    },
    components:{
        AuthenticatedLayout,
        Multiselect
    }
}
</script>