<template>
    <!-- Main navbar -->
    <MainNavbar />
	<!-- /main navbar -->
    <!-- Page content -->
	<div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Inner content -->
            <div class="content-inner">
                <!-- Page Header -->
                <PageHeader />
                <!-- Content area -->
                <div class="content">
                    <!-- Inner container -->
                    <div class="d-lg-flex align-items-lg-start">
                        <!-- Left sidebar component -->
                        <LeftSidebarNav />
                        <!-- /left sidebar component -->
                        <!-- Right content -->
                        <div class="flex-1">
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <Footer />
	<!-- Notifications -->
    <NotificationModal />
	<!-- /notifications -->
    <!-- Demo config -->
    <DemoConfig />
	<!-- /demo config -->
</template>


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
