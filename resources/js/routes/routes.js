//All register route list
import home from '../components/backend/dashboard';



import categoryView from "../components/backend/category/category";
import categoryCreate from "../components/backend/category/create";
import categoryEdit from "../components/backend/category/edit";

import postView from "../components/backend/post/manage";
import postEdit from "../components/backend/post/edit";



export let routes = [

	{ path: '/home', component: home },

	
	{ path: '/category_list', component: categoryView },
	{ path: '/category_create', component: categoryCreate },
	{ path: '/category_edit/:slug', component: categoryEdit },


	{ path: '/post_list', component: postView },
	{ path: '/post_edit/:slug', component: postEdit },
	
	
];
