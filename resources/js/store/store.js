export default {
	 state: {
	    categoriesData: []
	  },

	  getters: {
	  	categories(state) {
	  		return state.categoriesData;
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
	  	}
	  },

	  mutations: {
	  	categories(state, data){
	  		return state.categoriesData = data;
	  	}
	  }
}