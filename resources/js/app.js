import * as HeroIcons from '@heroicons/vue/24/outline';
import { createInertiaApp, router } from '@inertiajs/vue3';
import NProgress from 'nprogress';
import { createApp, h } from 'vue';
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
import './bootstrap';

// Add custom styles for NProgress
const progressStyle = document.createElement('style');
progressStyle.textContent = `
  #nprogress .bar {
    background: #4f46e5 !important; /* indigo-600 */
    height: 3px;
  }
  #nprogress .peg {
    box-shadow: 0 0 10px #4f46e5, 0 0 5px #4f46e5 !important;
  }
`;
document.head.appendChild(progressStyle);
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
