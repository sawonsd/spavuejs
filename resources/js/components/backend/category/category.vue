<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th><input type="checkbox"></th>
                      <th style="width: 10px">ID</th>
                      <th>Category Name</th>
                      <th>Slug</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr v-for="cat in category">
                      <td><input type="checkbox" :value="cat.id" v-model="categoriesId"></td>
                      <td>1.</td>
                      <td>{{cat.name}}</td>
                      <td>{{cat.slug}}</td>
                      <td>
                      		<router-link to="category_edit">
                      			<i type="button" class="fa fa-edit text-danger ml-2"></i>
                      		</router-link>
                      		<i type="button" @click="remove(cat.id)" class="fa fa-trash-alt text-danger"></i>
                      </td>
                    </tr>



                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
      












        </div>
        <!-- /.row -->



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "category",

        data: function(){
        	return {
        		categoriesId:[]
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

        methods: {
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
        }
    }

</script>
