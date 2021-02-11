//All register route list
import home from '../components/backend/dashboard';
import category from "../components/ExampleComponent";
import categoryCreate from "../components/backend/category/create";
import categoryView from "../components/backend/category/category";



export let routes = [

	{ path: '/home', component: home },
	{ path: '/category', component: category },
	{ path: '/category_create', component: categoryCreate },
	{ path: '/category_list', component: categoryView },
	
	
];
