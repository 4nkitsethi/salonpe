import './bootstrap';
import '../css/app.css';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@/assets/js/bootstrap/bootstrap.bundle.min.js';
import '@/assets/js/vendor/ui/prism.min.js';
import 'vue-multiselect/dist/vue-multiselect.css';
import $ from 'jquery';
window.$ = $;

import  '@/assets/js/vendor/uploader/image-uploader.min.js';
import  '@/assets/js/vendor/notifications/sweet_alert.min.js';
import '@/assets/js/vendor/slick/slick.min.js';

import { createApp, h } from 'vue';
import { createInertiaApp,Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueApexCharts from "vue3-apexcharts";
import 'vue-loading-overlay/dist/css/index.css';
import { QuillEditor } from '@vueup/vue-quill'
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
import PrimeVue from 'primevue/config';
import { vMaska } from "maska"



createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {       
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueApexCharts)
            .use(PrimeVue)
            .component('inertia-link',Link)
            .component('apexchart',VueApexCharts)
            .component('QuillEditor', QuillEditor)
            .directive("maska", vMaska)
            .mount(el);           
    },
    progress: {
         // The delay after which the progress bar will appear, in milliseconds...
            delay: 250,

            // Whether to include the default NProgress styles...
            includeCSS: true,

            // Whether the NProgress spinner will be shown...
            showSpinner: true,
    },
});


