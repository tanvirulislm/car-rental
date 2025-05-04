import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp, router } from '@inertiajs/vue3';
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
import * as HeroIcons from '@heroicons/vue/24/outline';
import NProgress from 'nprogress';

// Inertia progress bar
router.on('start', () => NProgress.start());
router.on('finish', () => NProgress.done());

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        // Register Heroicons globally
        Object.entries(HeroIcons).forEach(([name, component]) => {
            app.component(name, component);
        });

        // Register other global components
        app.component('EasyDataTable', Vue3EasyDataTable);

        app.use(plugin).mount(el);
    },
});
