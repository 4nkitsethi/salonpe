<template>
    <AuthenticatedLayout>
        <!-- Basic table -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">User List</h5>
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
                <table class="table table-xs table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th colspan="2">Created At</th>
                        </tr>
                    </thead>
                    <tbody>						
                        <tr v-for="(user,index) in users.data" :key="user.id">
                            <td>{{ Number(users.from) + (index++) }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td><code class="bg-transparent">{{ moment(user.created_at).format('YYYY-MM-DD') }}</code></td>
                            <td><inertia-link :href="'#'" class="fw-bold"><i class="ph-caret-right fw-bold"></i></inertia-link></td>
                        </tr>					
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <Pagination  :links="users.links" />
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
		users: Object,
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
				this.$inertia.get(this.route('user.index'), pickBy(this.form), { preserveState: true })
			}, 800),
		},
	}
}
</script>