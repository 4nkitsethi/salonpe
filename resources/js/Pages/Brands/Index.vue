<template>
    <AuthenticatedLayout>
        <!-- Basic table -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Brand List</h5>
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
                            <th colspan="2">Created At</th>
                        </tr>
                    </thead>
                    <tbody>						
                        <tr v-for="(brand,index) in brands.data" :key="brand.id">
                            <td>{{ Number(brands.from) + (index++) }}</td>
                            <td>{{ brand.name }}</td>
                            <td><code class="bg-transparent">{{ moment(brand.created_at).format('YYYY-MM-DD hh:mm A') }}</code></td>
                            <td><inertia-link :href="'#'" class="fw-bold"><i class="ph-caret-right fw-bold"></i></inertia-link></td>
                        </tr>					
                    </tbody>
                </table>
                
                <div  class="d-flex align-items-center p-5">
                    <ul class="pagination mx-auto" v-if="brands.links.length > 3">
                        <template v-for="(link, key) in brands.links">						
                            <li class="page-item disabled" v-if="link.url === null">
                                <inertia-link href="#" class="page-link" v-html="link.label"></inertia-link>
                            </li>						
                            <li class="page-item" :class="{ 'active': link.active }"  v-else >
                                <inertia-link :href="link.url" class="page-link" v-html="link.label"></inertia-link>
                            </li>
                        </template>
                    </ul>
                </div>
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
export default {
	props: {
		filters: Object,
		brands: Object,
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
        AuthenticatedLayout
    },
	watch: {
		form: {
			deep: true,
			handler: debounce(function () {				
				this.$inertia.get(this.route('brand.index'), pickBy(this.form), { preserveState: true })
			}, 800),
		},
	}
}
</script>