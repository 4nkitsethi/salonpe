<template>
    <AuthenticatedLayout>
        <!-- Basic table -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Product List</h5>
            </div>

            <div class="card-body">
                <div class="w-50 d-flex">
                    <div class="me-1">
                        <label>Filter By</label>
                        <select v-model="form.by" class="form-select w-auto">
                            <option value="name">Name</option>
                            <option value="email">Type</option>
                            <option value="created_at">Created At</option>
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
                <table class="table table-sm table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th colspan="2">Created At</th>
                        </tr>
                    </thead>
                    <tbody>						
                        <tr v-for="(product,index) in products.data" :key="product.id">
                            <td>{{ Number(products.from) + (index++) }}</td>
                            <td>{{ product.name }}</td>
                            <td> {{ product.type }}</td>
                            <td>{{ product.brand_id }}</td>
                            <td> {{ product.category_id }}</td>
                            <td>{{ product.sub_category_id }}</td>
                            <td><code class="bg-transparent">{{ moment(product.created_at).format('YYYY-MM-DD') }}</code></td>
                            <td><inertia-link :href="'#'" class="fw-bold"><i class="ph-caret-right fw-bold"></i></inertia-link></td>
                        </tr>					
                    </tbody>
                </table>
                <!-- Pagination -->
                <Pagination  :links="products.links" />                
            </div>
        </div>		
        <!-- /basic table -->
    </AuthenticatedLayout>
</template>

<script>
import debounce from 'lodash/debounce'
import pickBy from 'lodash/pickBy'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import moment from 'moment'
import Pagination from '@/Components/Pagination.vue';

export default {
	props: {
		filters: Object,
		products: Object,
	},
	data() {
		return {
                moment,
				form: {
					search: null,
					trashed: null,
					by:'name'
				},
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
				this.$inertia.get(this.route('product.index'), pickBy(this.form), { preserveState: true })
			}, 800),
		},
	}
}
</script>