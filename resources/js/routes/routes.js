//All register route list
import home from '../components/backend/dashboard';


import categoryCreate from "../components/backend/category/create";
import categoryView from "../components/backend/category/category";
import categoryEdit from "../components/backend/category/edit";

import postView from "../components/backend/post/manage";



export let routes = [

	{ path: '/home', component: home },

	{ path: '/category_create', component: categoryCreate },
	{ path: '/category_list', component: categoryView },
	{ path: '/category_edit/:slug', component: categoryEdit },


	{ path: '/post_list', component: postView },
	
	
];
