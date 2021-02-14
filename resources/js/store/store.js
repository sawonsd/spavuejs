export default {
	 state: {
	    postsData: [],
	    categoriesData: []
	  },

	  getters: {
	  	categories(state) {
	  		return state.categoriesData;
	  	},
	  	posts(state) {
	  		return state.postsData;
	  	}
	  },

	  actions: {
	  	getCategories(data) {
	  		axios.get('get-category').then((response)=>{
	  			data.commit('categories', response.data.categories);
	  			console.log(response.data.categories);
	  		}).catch((error)=> {
	  			console.log(error);
	  		})
	  	},
	  	getPosts(data) {
	  		axios.get('get-posts').then((response)=>{
	  			data.commit('posts', response.data.posts);
	  			console.log(response.data.posts);
	  		}).catch((error)=> {
	  			console.log(error);
	  		})
	  	}
	  },

	  mutations: {
	  	categories(state, data){
	  		return state.categoriesData = data;
	  	},
	  	posts(state, data){
	  		return state.postsData = data;
	  	}
	  }
}