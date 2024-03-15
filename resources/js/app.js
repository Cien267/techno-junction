import { createApp } from 'vue';
import HeaderSearchBar from '../components/HeaderSearchBar.vue';
import ListServicesByCategory from '../components/ListServicesByCategory.vue';

const app = createApp({
    template: `
      <div>
        <HeaderSearchBar />
      </div>
    `,
});
app.component('HeaderSearchBar', HeaderSearchBar);
app.mount('#header-search-bar');

const app2 = createApp({
    template: `
        <ListServicesByCategory :route="laravelRoute"/>
    `,
    data() {
        return {
            laravelRoute: document.getElementById('list-services-by-category').dataset.route,
        };
    },
});
app2.component('ListServicesByCategory', ListServicesByCategory);
app2.mount('#list-services-by-category');
