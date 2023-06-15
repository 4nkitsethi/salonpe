<template>
    <AuthenticatedLayout>
        <!-- Basic table -->
        <div class="card">
            <div class="card-header d-sm-flex align-items-sm-center py-1">
                <h5 class="mb-0"> <i class="ph-tree-structure me-1"></i> Sub Category List</h5>
                <div class="ms-auto">
                    <inertia-link class="btn btn-success fw-bold" data-bs-popup="tooltip" title="Create New Sub Category" data-bs-placement="left"  :href="route('sub.category.create')"> <i class="ph-plus fw-bold"></i> </inertia-link>
                </div>
            </div>

            <div class="card-body">
                <div class="w-50 d-flex">
                    <div class="me-1">
                        <label>Filter By</label>
                        <select v-model="form.by" class="form-select w-auto">
                            <option value="name">Name</option>
                            <option value="created_at">Created At</option>
                        </select>					
                    </div>

                    <div class="me-1">
                        <label>Filter By Category</label>
                        <select v-model="form.category" class="form-select w-auto">
                            <option value="">Choose Category</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                        </select>					
                    </div>

                    

                    <div>
                        <label></label>
                        <input class="form-control d-flex-grow"  placeholder="Filter brands ..." v-model="form.search"/>
                    </div>
                    <!--  -->					
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-xs table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th colspan="2">Created At</th>
                        </tr>
                    </thead>
                    <tbody>	                                          			
                        <template v-for="(category,index) in subCategories.data" :key="category.id">                               
                            <tr>
                                <td>{{ Number(subCategories.from) + (index++) }}</td>
                                <td>{{ category.name }} <code>{{ category.category.name }}</code></td>
                                <td><code class="bg-transparent">{{ moment(category.created_at).format('YYYY-MM-DD hh:mm A') }}</code></td>
                                <td><inertia-link :href="route('category.edit',category.id)" class="fw-bold"><i class="ph-caret-right fw-bold"></i></inertia-link></td>
                            </tr>                     
                        </template>				
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <Pagination  :links="subCategories.links" />
            </div>
        </div>		
        <!-- /basic table -->

        
            <form @submit.prevent="saveSubCategory" class="offcanvas offcanvas-end" tabindex="-1" id="subcategory">                

                <div class="offcanvas-header border-bottom py-0">
                    <h5 class="offcanvas-title py-3">Sub Category</h5>
                    <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill" data-bs-dismiss="offcanvas">
                        <i class="ph-x"></i>
                    </button>
                </div>

                <div class="offcanvas-body">
                    <div class="fw-semibold mb-2">Category</div>
                    <div class="list-group mb-3">
                        <input readonly class="disabled form-control" v-model="subcategory.category"/>
                    </div>

                    <div class="fw-semibold mb-2">Sub Category</div>
                    <div class="list-group mb-3">
                        <input class="form-control" placeholder="Sub Category Name ..." v-model="   subcategory.name"/>
                    </div>
                    
                </div>

                <div class="border-top text-center py-2 px-3">
                    <button type="submit" class="btn btn-yellow fw-semibold w-100 my-1">
                        <i class="ph-database me-2"></i>
                        Create
                    </button>
                </div>
            </form>
    </AuthenticatedLayout>
</template>

<script>
import debounce from 'lodash/debounce'
import pickBy from 'lodash/pickBy'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import moment from 'moment'
export default {
	props: {
		filters: Object,
		subCategories: Object,
        categories:Object
	},
	data() {
		return {
                moment,
				form: {
					search: null,
					trashed: null,
					by:'name',
                    category:null
				},
                subcategory : this.$inertia.form({
                                    category:null, 
                                    parent_id:null,                                    
                                    name : null
                })
		}
	},
    components:{
        AuthenticatedLayout,
        Pagination
    },
	watch: {
		form: {
			deep: true,
			handler: debounce(function () {				
				this.$inertia.get(this.route('sub.category.index'), pickBy(this.form), { preserveState: true })
			}, 800),
		},
	},
    methods:{
                openSubCategoryModal(category){
                    this.subcategory.parent_id = category.id
                    this.subcategory.category = category.name   
                    this.subcategory.name = null
                },
                saveSubCategory(){
                    this.subcategory.post(this.route('category.store'));  
                    var myOffcanvas = document.getElementById('subcategory')
                    var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
                    bsOffcanvas.hide()
                }
    },
    mounted(){
        const tooltipSelector = document.querySelectorAll('[data-bs-popup="tooltip"]');
        tooltipSelector.forEach(function(popup) {
            new bootstrap.Tooltip(popup, {
                boundary: '.page-content'
            });
        });

        console.log(this.subCategories.data);
    },
    beforeUnmount(){
        const tooltipSelectors = document.querySelectorAll('.tooltip');
        tooltipSelectors.forEach(function(popup) {
                popup.remove();                                  
        });
    }
}
</script>