<template>
    <!-- Main sidebar -->
    <div class="sidebar sidebar-main sidebar-expand-lg align-self-start" style="max-width:17em">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- Sidebar header -->
            <div class="sidebar-section">
                <div class="sidebar-section-body d-flex justify-content-center">
                    <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                    <div>
                        <button type="button" class="btn btn-light btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                            <i class="ph-arrows-left-right"></i>
                        </button>

                        <button type="button" class="btn btn-light btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                            <i class="ph-x"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /sidebar header -->


            <!-- Main navigation -->
            <div class="sidebar-section">
                <ul class="nav nav-sidebar mb-4" data-nav-type="accordion">
                    <!-- Main -->
                    <li class="nav-item-header">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                    <li class="nav-item">                        
                        <inertia-link :href="route('dashboard')" class="nav-link" :class="{ 'active': route().current('dashboard') }">
                            <i class="ph-circles-four"></i>
                            <span>Dashboard</span>
                        </inertia-link>
                    </li>

                    <!-- Product Panel -->
                    <li class="nav-item-header">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Product Panel</div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                    
                    <li class="nav-item">
                        <inertia-link :href="route('product.index')" class="nav-link" :class="{ 'active': $page.url.startsWith('/product') }">
                            <i class="ph-stack-simple"></i>
                            <span>Products</span>
                            <span class="badge bg-primary align-self-center rounded-pill ms-auto">{{$page.props.auth.productCount}} Active</span>
                        </inertia-link>
                    </li>

                    <li class="nav-item">
                        <inertia-link :href="route('category.index')" class="nav-link " :class="{ 'active': $page.url.startsWith('/category') }">
                            <i class="ph-tree-structure"></i>
                            <span>Categories</span>
                        </inertia-link>
                    </li>

                    <li class="nav-item">
                        <inertia-link :href="route('sub.category.index')" class="nav-link " :class="{ 'active': $page.url.startsWith('/sub') }">
                            <i class="ph-tree-structure"></i>
                            <span>Sub Categories</span>
                        </inertia-link>
                    </li>


                    <li class="nav-item">
                        <inertia-link :href="route('tag.index')" class="nav-link " :class="{ 'active': $page.url.startsWith('/tag') }">
                            <i class="ph-strategy"></i>
                            <span>Tags</span>
                        </inertia-link>
                    </li>

                    <!-- <li class="nav-item">
                        <inertia-link :href="route('attribute.index')" class="nav-link " :class="{ 'active': $page.url.startsWith('/attribute') }">
                            <i class="ph-strategy"></i>
                            <span>Attributes</span>
                        </inertia-link>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="ph-scales"></i>
                            <span>Stock Managements</span>
                        </a>
                    </li> -->
                    

                    <!-- CMS Panel -->
                    <li class="nav-item-header">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">CMS Panel</div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                    
                    <li class="nav-item">
                        <inertia-link :href="route('brand.index')" class="nav-link" :class="{ 'active': $page.url.startsWith('/brand') }">
                            <i class="ph-yin-yang"></i>
                            <span>Brands</span>
                            <span class="badge bg-primary align-self-center rounded-pill ms-auto">{{$page.props.auth.brandCount}} Active</span>
                        </inertia-link>
                    </li>

                    <li class="nav-item">
                        <inertia-link :href="route('setting.index')" class="nav-link" :class="{ 'active': $page.url.startsWith('/setting') }">
                            <i class="ph-gear"></i>
                            <span>Setting</span>
                        </inertia-link>
                    </li>

                    <li class="nav-item">
                        <inertia-link :href="route('banner.index')" class="nav-link" :class="{ 'active': $page.url.startsWith('/banner') }">
                            <i class="ph-wall"></i>
                            <span>Banners</span>
                        </inertia-link>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ph-user-focus"></i>
                            <span>Our Solutions</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ph-clipboard-text"></i>
                            <span>Blogs</span>
                        </a>
                    </li>	

                    <!-- Order Panel -->
                    <li class="nav-item-header">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Order Panel</div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ph-clipboard"></i>
                            <span>Orders</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="ph-star-half"></i>
                            <span>Rating List</span>
                        </a>
                    </li>                    

                    <!-- Customer Panel -->
                    <li class="nav-item-header">
                        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Customer Panel</div>
                        <i class="ph-dots-three sidebar-resize-show"></i>
                    </li>
                    <li class="nav-item">
                        <inertia-link :href="route('user.index')" class="nav-link" :class="{ 'active' : route().current('user.index') }" >
                            <i class="ph-users-three"></i>
                            <span>Users</span>
                            <span class="badge bg-success rounded-pill ms-auto">{{$page.props.auth.userCount}} Active</span>
                        </inertia-link>
                    </li>
                </ul>
            </div>
            <!-- /main navigation -->
        </div>
        <!-- /sidebar content -->			
    </div>
    <!-- /main sidebar -->
</template>

<script>
       export default {
            props : ['auth'],
            mounted(){
                //                 
                const sidebarMainResize = function() {

                    // Elements
                    const sidebarMainElement = document.querySelector('.sidebar-main'),
                    sidebarMainToggler = document.querySelectorAll('.sidebar-main-resize'),
                    resizeClass = 'sidebar-main-resized',
                    unfoldClass = 'sidebar-main-unfold';


                    // Config
                    if (sidebarMainElement) {

                        // Define variables
                        const unfoldDelay = 150;
                        let timerStart,
                            timerFinish;

                        // Toggle classes on click
                        sidebarMainToggler.forEach(function(toggler) {
                            toggler.addEventListener('click', function(e) {
                                e.preventDefault();
                                sidebarMainElement.classList.toggle(resizeClass);
                                !sidebarMainElement.classList.contains(resizeClass) && sidebarMainElement.classList.remove(unfoldClass);
                            });                
                        });

                        // Add class on mouse enter
                        sidebarMainElement.addEventListener('mouseenter', function() {
                            clearTimeout(timerFinish);
                            timerStart = setTimeout(function() {
                                sidebarMainElement.classList.contains(resizeClass) && sidebarMainElement.classList.add(unfoldClass);
                            }, unfoldDelay);
                        });

                        // Remove class on mouse leave
                        sidebarMainElement.addEventListener('mouseleave', function() {
                            clearTimeout(timerStart);
                            timerFinish = setTimeout(function() {
                                sidebarMainElement.classList.remove(unfoldClass);
                            }, unfoldDelay);
                        });
                    }
                };

                // 
                sidebarMainResize();
            }
       } 
</script>

