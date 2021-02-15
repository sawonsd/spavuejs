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
                      <th>Title</th>
                      <th>Create by</th>
                      <th>Category</th>
                      <th>Post</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr v-for="post in posts">
                      <td>{{post.id}}</td>
                      <td>{{post.title | truncate(10, '...')}}</td>
                      <td>{{post.user.name | truncate(10, '...')}}</td>
                      <td>{{post.category.name}}</td>
                      <td>{{post.content | truncate(10, '...')}}</td>
                      <td><img width="40" :src="post.thumbnail" alt=""></td>
                      <td><span class="badge" :class="statusColor(post.status)">{{post.status | capitalize}}</span></td>

                      <td>
                      		<router-link :to="'post_edit/' + post.slug">
                      			<i type="button" class="fa fa-edit text-danger ml-2"></i>
                      		</router-link>
                      		<i type="button" @click="remove(post.id)" class="fa fa-trash-alt text-danger"></i>
                      </td>
                    </tr>

                    <tr v-if="emptyData()">
                      <td colspan="8" class="text-center text-danger h4">Data Not found</td>
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
          emptyData()
          {
            return (this.posts.length < 1);
          },

          statusColor: function(status)
          {
            let data = {published: "badge-success", draft: "badge-danger"}
            return data[status];
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

					  	axios.get('remove-post/'+id).then((response)=>{

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
	  				this.$store.dispatch("getPosts");

	  				
		  		}).catch((error)=> {
		  			
		  	

		  		})


					    


				}
					})


	        	
	        }
        }
    }

</script>
