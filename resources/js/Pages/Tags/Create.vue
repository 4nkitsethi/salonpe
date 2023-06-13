<template>
    <AuthenticatedLayout>
        <!-- Basic layout -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="ph-yin-yang me-1"></i> Tag</h5>
            </div>

            <div class="card-body">
                <form @submit.prevent="saveTag">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Tag Name ..." v-model="form.tag.name"/>
                    </div>  
                                        
                    <div class="form-group  mb-3">
                        <label class="form-label">Category</label>                        
                        <multiselect v-model="form.tag.subCategory" :options="categories"  group-values="sub_categories" group-label="name"  :group-select="false" placeholder="Type to search category" track-by="name" label="name" :multiple="true"><span slot="noResult">Oops! No category found. Consider changing the search query.</span></multiselect>    
                    </div>             

                    <div class="text-end">
                        <inertia-link :href="route('tag.index')" class="btn btn-danger mx-2">Return Back</inertia-link>
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
import { mapValues } from 'lodash'

export default {
    props:["categories"],
	data() {
		return {
                 form : {
                           tag: this.$inertia.form({
                                                            name : null,
                                                            subCategory:null,
                                                            category:null
                            })
                 }     
		}
	},
    methods:{
                saveTag(){      
                            this.form.tag.category = mapValues(this.form.tag.subCategory,'id');
                            this.form.tag.post(this.route('tag.store'));                            
                }
    },
    components:{
        AuthenticatedLayout,
        Multiselect
    }
}
</script>