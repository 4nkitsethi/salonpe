<template>
    <AuthenticatedLayout>
        <!-- Basic table -->
        <div class="card">
            <div class="card-header d-sm-flex align-items-sm-center py-1">
                <h5 class="mb-0"> <i class="ph-yin-yang me-1"></i> Banner List</h5>
                <div class="ms-auto">
                    <inertia-link class="btn btn-success fw-bold" data-bs-popup="tooltip" title="Create New Banner" data-bs-placement="left"  :href="route('banner.create')"> <i class="ph-plus fw-bold"></i> </inertia-link>
                </div>
            </div>

            <div class="card-body">
                <div class="w-50 d-flex">
                    <div class="me-1">
                        <label>Filter By</label>
                        <select v-model="form.by" class="form-select w-auto">
                            <option value="title">Title</option>
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
                            <th>Banner</th>
                            <th colspan="2">Created At</th>
                        </tr>
                    </thead>
                    <tbody>						
                        <tr v-for="(banner,index) in banners.data" :key="banner.id">
                            <td>{{ Number(banners.from) + (index++) }}</td>
                            <td>{{ banner.title }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="d-inline-block me-3">
                                        <img :src="banner.image" class="rounded" width="100" height="100" alt="">
                                    </a>
                                    <div>
                                        <a href="#" class="text-body fw-semibold">{{ banner.heading }}</a>
                                        <div class="d-flex align-items-center text-muted fs-sm">
                                           <a :href="banner.link" v-html="banner.link" ></a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><code class="bg-transparent">{{ moment(banner.created_at).format('YYYY-MM-DD hh:mm A') }}</code></td>
                            <td><inertia-link :href="route('banner.edit',banner.id)" class="fw-bold"><i class="ph-caret-right fw-bold"></i></inertia-link></td>
                        </tr>					
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <Pagination  :links="banners.links" />
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
		banners: Object,
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
				this.$inertia.get(this.route('banner.index'), pickBy(this.form), { preserveState: true })
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