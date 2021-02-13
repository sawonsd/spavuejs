<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            	<!-- Content Header (Page header) -->

            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" @submit.prevent="addCategory">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category</label>
                    <input type="text" name="name" v-model="form.name" class="form-control" id="name" placeholder="Category Name" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" :disabled="form.busy" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-4">
            	<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                
                	<ul class="list-inline text-secondary">
					    <li v-for="cat in category">
					        <i class="fa fa-folder text-secondary mr-2"></i> {{cat.name}} 

					        <router-link :to="'/category_edit/'+ cat.slug">
					        	<i class="fa fa-edit float-right text-danger ml-2"></i>
					        </router-link> 

					        <i type="button" @click="remove(cat.id)" class="fa fa-trash-alt float-right text-danger"></i>
					    </li>

					   
					</ul>

                </div>

            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "create",

	        data () {
			    return {
			      // Create a new form instance
			      form: new Form({
			        name: '',
			      })
			    }
			  },

		methods: {
			addCategory: function (){

				let aithis = this;
				this.form.post('/add-category').then(function(data){

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

					toastr.success("Category Created successfully",'Success');

					//change router
					//aithis.$router.push('/category_create');

					aithis.form.name = null;
					aithis.form.slug = null;
					aithis.form.status = null;


				}).catch((error)=> {
	  				//toastr.error("Somting Worng");
	  				Swal.fire(
					      'Error!',
					      'Category Not Created Somting Worng.',
					      'error'
					 )
	  		})

				this.$store.dispatch("getCategories");
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


	        	
	        }

		},





		mounted() {
        	this.$store.dispatch("getCategories");
        },

        computed: {
        	category() {
        		return this.$store.getters.categories;
        	}
        },

       

		
    }
</script>
