import './bootstrap';
import '../css/app.css';
import '@/assets/js/bootstrap/bootstrap.bundle.min.js';
import '@/assets/js/vendor/ui/prism.min.js';



import { createApp, h } from 'vue';
import { createInertiaApp,Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueApexCharts from "vue3-apexcharts";
import { router } from '@inertiajs/vue3'
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/css/index.css';
import { useLoading } from 'vue-loading-overlay';
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {       
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueApexCharts)
            .use(VueLoading,{
                // Pass props by their camelCased names
                color: '#984346',
                loader: 'bars',
                width: 80,
                height: 80,
                backgroundColor: '#ffffff',
                opacity: 0.3,
                zIndex: 999,
            })
            .component('inertia-link',Link)
            .component('apexchart',VueApexCharts)
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


