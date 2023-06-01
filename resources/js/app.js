import './bootstrap';
import '../css/app.css';
import '@/assets/js/bootstrap/bootstrap.bundle.min.js';
import '@/assets/js/vendor/ui/prism.min.js';



import { createApp, h } from 'vue';
import { createInertiaApp,Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueApexCharts from "vue3-apexcharts";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueApexCharts)
            .component('inertia-link',Link)
            .component('apexchart',VueApexCharts)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
