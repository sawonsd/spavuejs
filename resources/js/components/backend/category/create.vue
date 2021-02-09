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
					    <li>
					        <i class="fa fa-folder"></i> Category Name List
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
					console.log(data);
					Toast.fire({
					  icon: 'success',
					  title: 'Category Created successfully'
					})

					//change router
					//aithis.$router.push('/category_create');

					aithis.form.name = null;
					aithis.form.slug = null;
					aithis.form.status = null;

				})
			}
		},

		
    }
</script>
