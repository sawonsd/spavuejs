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
                      <th style="width: 10px">ID</th>
                      <th>Category Name</th>
                      <th>Category Name</th>
                      <th>Category Name</th>
                      <th>Category Name</th>
                      <th>Category Name</th>
                      <th>Slug</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr v-for="post in posts">
                      <td>{{post.id}}</td>
                      <td>{{post.title}}</td>
                      <td>{{post.category.name}}</td>
                      <td>
                        <img width="40" :src="post.thumbnail" alt="">
                      </td>
                      <td>{{post.name}}</td>
                      <td>{{post.name}}</td>
                      <td>{{post.slug}}</td>
                      <td>
                      		<router-link :to="'category_edit/' + post.slug">
                      			<i type="button" class="fa fa-edit text-danger ml-2"></i>
                      		</router-link>
                      		<i type="button" @click="remove(post.id)" class="fa fa-trash-alt text-danger"></i>
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
        name: "manage",

        // data: function(){
        // 	return {
        		
        // 	}
        // },

        mounted() {
        	this.$store.dispatch("getPosts");
        },

        computed: {
        	posts() {
        		return this.$store.getters.posts;
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
