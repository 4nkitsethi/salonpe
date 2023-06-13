<template>
    <AuthenticatedLayout>
        <!-- Basic table -->
        <div class="card">
            <div class="card-header d-sm-flex align-items-sm-center py-1">
                <h5 class="mb-0"> <i class="ph-yin-yang me-1"></i> Tag List</h5>
                <div class="ms-auto">
                    <inertia-link class="btn btn-success fw-bold" data-bs-popup="tooltip" title="Create New Tag" data-bs-placement="left"  :href="route('tag.create')"> <i class="ph-plus fw-bold"></i> </inertia-link>
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
                            <th>Tag</th>
                            <th colspan="2">Category</th>
                        </tr>
                    </thead>
                    <tbody>						
                        <tr v-for="(tag,index) in tags.data" :key="tag.id">
                            <td>{{ Number(tags.from) + (index++) }}</td>
                            <td class="fw-bold">{{  tag.name }}</td>
                            <td>
                                <code v-for="category in tag.category" :key="category.id" v-html="category.name" class="me-2" ></code>
                                <code v-if="tag.category.length == 0">N/A</code>
                            </td>
                            <td><inertia-link :href="route('tag.edit',tag.id)" class="fw-bold"><i class="ph-caret-right fw-bold"></i></inertia-link></td>
                        </tr>					
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <Pagination  :links="tags.links" />
            </div>
        </div>		
        <!-- /basic table -->
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
		tags: Object,
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
				this.$inertia.get(this.route('tag.index'), pickBy(this.form), { preserveState: true })
			}, 800),
		},
	},
    mounted(){
        const tooltipSelector = document.querySelectorAll('[data-bs-popup="tooltip"]');
        tooltipSelector.forEach(function(popup) {
            new bootstrap.Tooltip(popup, {
                boundary: '.page-content'
            });
        });
    },
    beforeUnmount(){
        const tooltipSelectors = document.querySelectorAll('.tooltip');
        tooltipSelectors.forEach(function(popup) {
                popup.remove();                                  
        });
    }
}
</script>