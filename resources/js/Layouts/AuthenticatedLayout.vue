<template>
    	<!-- Main navbar -->
        <MainNavbar />	    
	    <!-- Page content -->
        <div class="page-content">
        <!-- Main sidebar -->
        <LeftSidebarNav />
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div class="content">
                    <slot />
                </div>
                <!-- /content area -->
            </div>
        </div>
        <!-- /page content -->
    <!-- Footer -->
    <Footer />
	<!-- Notifications -->
    <NotificationModal />
	<!-- /notifications -->
    <!-- Demo config -->
    <DemoConfig />
	<!-- /demo config -->
</template>

<style>
    @import '@/assets/css/all.min.css';
</style>

<script>
import Footer from "./Footer.vue"
import MainNavbar from "./MainNavbar.vue"
import LeftSidebarNav from "./LeftSidebarNav.vue"
import DemoConfig from "./DemoConfig.vue"
import PageHeader from "./PageHeader.vue"
import NotificationModal from "./NotificationModal.vue"
export default {
	components:{
		Footer,
        MainNavbar,
        LeftSidebarNav,
        NotificationModal,
        DemoConfig,
        PageHeader
	}
}
</script>
