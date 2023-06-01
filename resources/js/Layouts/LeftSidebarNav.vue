<template>
    <div class="sidebar sidebar-component sidebar-expand-lg border rounded shadow-sm me-lg-3 mb-3" style="width:18em">
        <!-- Sidebar content -->
        <div class="sidebar-content">
            <!-- Sub navigation -->
            <div class="sidebar-section">
                <div class="collapse show" id="sidebar-navigation">
                    <ul class="nav nav-sidebar mt-2" data-nav-type="accordion">
                        <li class="nav-item-header opacity-50">Navigations</li>
                        <li class="nav-item">
                            <inertia-link :href="route('dashboard')" class="nav-link" :class="{ 'active': route().current('dashboard') }">
                                <i class="ph-circles-four me-2"></i>
                                Dashboard
                            </inertia-link>
                        </li>											
                    </ul>
                </div>
            </div>
            <!-- /sub navigation -->

            <!-- Product navigation -->
            <div class="sidebar-section">
                <div class="sidebar-section-header border-bottom">
                    <span class="fw-semibold">
                        <i class="ph-stack"></i>
                        Product Panel
                    </span>
                    <div class="ms-auto">
                        <a href="#product-navs" class="text-reset" data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator"></i>
                        </a>
                    </div> 
                </div>

                <div class="collapse section-bg-light show" id="product-navs">
                    <ul class="nav nav-sidebar mt-2" data-nav-type="accordion">
                        <li class="nav-item">
                            <inertia-link :href="route('product.index')" class="nav-link" :class="{ 'active': route().current('product.index') }">
                                <i class="ph-stack-simple me-2"></i>
                                Products
                                <span class="badge bg-success rounded-pill ms-auto">{{$page.props.auth.productCount}} Active</span>
                            </inertia-link>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-tree-structure me-2"></i>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-tree-structure me-2"></i>
                                Sub Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-tag me-2"></i>
                                Tags
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="	ph-strategy me-2"></i>
                                Attributes
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-scales me-2"></i>
                                Stock Managements
                            </a>
                        </li>											
                    </ul>
                </div>
            </div>
            <!-- /Product navigation -->

            <!-- CMS navigation -->
            <div class="sidebar-section">
                <div class="sidebar-section-header border-bottom">
                    <span class="fw-semibold">
                        <i class="ph-gear"></i>
                        CMS Panel
                    </span>
                    <div class="ms-auto">
                        <a href="#cms-navs" class="text-reset" data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator"></i>
                        </a>
                    </div> 
                </div>

                <div class="collapse section-bg-light show" id="cms-navs">
                    <ul class="nav nav-sidebar mt-2" data-nav-type="accordion">
                        <li class="nav-item">
                            <inertia-link :href="route('brand.index')" class="nav-link" :class="{ 'active' : route().current('brand.index') }">
                                <i class="ph-yin-yang me-2"></i>
                                Brands
                                <span class="badge bg-success rounded-pill ms-auto">{{$page.props.auth.brandCount}} Active</span>
                            </inertia-link>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-gear me-2"></i>
                                CMS Setting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-gear me-2"></i>
                                Site Setting
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-wall me-2"></i>
                                Banners
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-user-focus me-2"></i>
                                Our Solutions
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-clipboard-text me-2"></i>
                                Blogs
                            </a>
                        </li>											
                    </ul>
                </div>
            </div>
            <!-- /CMS navigation -->


            <!-- Order navigation -->
            <div class="sidebar-section">
                <div class="sidebar-section-header border-bottom">
                    <span class="fw-semibold">
                        <i class="ph-clipboard-text"></i> 
                        Order Panel
                    </span>
                    <div class="ms-auto">
                        <a href="#order-navs" class="text-reset" data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator"></i>
                        </a>
                    </div> 
                </div>

                <div class="collapse section-bg-light show" id="order-navs">
                    <ul class="nav nav-sidebar mt-2" data-nav-type="accordion">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-clipboard me-2"></i>
                                Orders
                                <span class="badge bg-primary rounded-pill ms-auto">94 Active</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="ph-star-half me-2"></i>
                                Rating List
                            </a>
                        </li>																					
                    </ul>
                </div>
            </div>
            <!-- / Order navigation -->

            <!-- Customers navigation -->
            <div class="sidebar-section">
                <div class="sidebar-section-header border-bottom">
                    <span class="fw-semibold">
                        <i class="ph-user"></i>
                        Customer Panel
                    </span>
                    <div class="ms-auto">
                        <a href="#customer-navs" class="text-reset" data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator"></i>
                        </a>
                    </div> 
                </div>

                <div class="collapse section-bg-light show" id="customer-navs">
                    <ul class="nav nav-sidebar mt-2" data-nav-type="accordion">
                        <li class="nav-item">
                            <inertia-link :href="route('user.index')" class="nav-link" :class="{ 'active' : route().current('user.index') }" >
                                <i class="ph-users-three me-2"></i>
                                Users
                                <span class="badge bg-success rounded-pill ms-auto">{{$page.props.auth.userCount}} Active</span>
                            </inertia-link>
                        </li>																					
                    </ul>
                </div>
            </div>
            <!-- / Order navigation -->
        </div>
        <!-- /sidebar content -->
    </div>
</template>

<script>
       export default {
            props : ['auth']
       } 
</script>

