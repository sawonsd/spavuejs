<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            	<!-- Content Header (Page header) -->

            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" @submit.prevent="updateCategory">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" v-model="form.name" class="form-control" id="name" placeholder="Post title" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                  </div>

                  <div class="form-group">
                    <label for="name">Content</label>
                    <input type="text" name="name" v-model="form.name" class="form-control" id="name" placeholder="Post Content" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" :disabled="form.busy" class="btn btn-success">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "edit",

	        data () {
			    return {
			      // Create a new form instance
			      form: new Form({
			      	id: null,
			        name: null,
			      })
			    }
			  },
		mounted() {
			this.getCategorydata();
        	
        },

		methods: {
			updateCategory: function (){

				let aithis = this;
				this.form.post('/update-category').then(function(data){

					// console.log(data);
					// Toast.fire({
					//   icon: 'success',
					//   title: 'Category Created successfully'
					// })
					// Swal.fire(
					//       'Success!',
					//       'Category Created successfully.',
					//       'success'
					//  )

					

					//change router
					aithis.$router.push('/category_list');

					toastr.success("Category updated successfully",'Success');

					// aithis.form.name = null;
					// aithis.form.slug = null;
					// aithis.form.status = null;


				}).catch((error)=> {
	  				//toastr.error("Somting Worng");
	  				Swal.fire(
					      'Error!',
					      'Category Created Somting Worng.',
					      'error'
					 )
	  		})

				//this.$store.dispatch("getCategories");
			},

			remove: function(id){

				Swal.fire({
					  title: 'Are you sure?',
					  text: "You won't be able to revert this!",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					  if (result.isConfirmed) {

					  	axios.get('remove-category/'+id).then((response)=>{

	  				//toastr.success(response.data);
	  				//toastr.success('Category delete success','Success');
	  		// 		Toast.fire({
					//   icon: 'success',
					//   title: 'Category delete successfully'
					// })
					Swal.fire(
					      'Deleted!',
					      'Category delete success.',
					      'success'
					 )
	  				this.$store.dispatch("getCategories");

	  				
		  		}).catch((error)=> {
		  			
		  	

		  		})


					    


				}
					})


	        	
	        },

	        getCategorydata: function(){

	        	const this_ =this;
	        	axios.get('edit-category/'+ this.$route.params.slug).then((response)=>{
	        		//console.log(response.data.category);
	        		
	        		this_.form.fill(response.data.category);
	
	        	}).catch((error)=>{
	        		console.log(error);
	        	})
	        }

		},



		

        computed: {
        	category() {
        		return this.$store.getters.categories;
        	}
        },

       

		
    }
</script>
