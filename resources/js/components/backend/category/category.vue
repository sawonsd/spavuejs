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
                      <th style="width:20px"><input :disabled="emptyData()" type="checkbox" @click="selectAll" v-model="selectedAll">
                        
                      </th>
                      <th style="width: 10px">ID</th>
                      <th>Category Name</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th style="width: 40px">
                        <div class="dropdown">
                        <button :disabled="!isSelected" class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <button @click="removeItems(selected)" class="dropdown-item" href="#">Remove</button><button @click="changeStatus(selected,1)" class="dropdown-item" href="#">Active</button>
                        </div>
                    </div>
                      </th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr v-for="cat in category">
                      <td><input type="checkbox" :value="cat.id" v-model="selected"></td>
                      <td>{{cat.id}}</td>
                      <td>{{cat.name}}</td>
                      <td>{{cat.slug}}</td>
                      <td>
                        <span type="submit" class="badge" @click="changeStatus(cat.id,selected,cat.status)" :class="statusColor(cat.status)">{{statusName(cat.status)}}</span>
                        
                      </td>
                      <td>
                      		<router-link :to="'category_edit/' + cat.slug">
                      			<i type="button" class="fa fa-edit text-danger ml-2"></i>
                      		</router-link>
                      		<i type="button" @click="remove(cat.id)" class="fa fa-trash-alt text-danger"></i>
                      </td>
                    </tr>

                    <tr v-if="emptyData()">
                      <td colspan="5" class="text-center text-danger h4">Data Not found</td>
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
        		selected:[],
            isSelected:false,
            selectedAll:false,
        	}
        },

        mounted() {
        	this.$store.dispatch("getCategories");
        },

        watch: {
          selected: function(selected){
            this.isSelected=(selected.length > 0);
            this.selectedAll = (selected.length === this.category.length);
          }
        },

        computed: {
        	category() {
        		return this.$store.getters.categories;
        	}
        },

        methods: {
          statusName: function(status)
          {
            let data = {0:"Inactive",1:"Active"}
            return data[status];
          },
          statusColor: function(status)
          {
            let data = {1: "badge-success", 0: "badge-danger"}
            return data[status];
          },
          removeItems: function(selected){
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
             console.log(selected);
            axios.post('/categories-remove-items', {data:selected}).then((response)=>{
              console.log(response.data);
              this.$store.dispatch("getCategories");
              this.selected=[];
              this.isSelected=false;
              this.selectedAll=false;
              toastr.success(response.data.total + " Category delete successfully",'Success');

            }).catch((error)=> {
            
        

          })


              


        }
          })


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

          changeStatus: function(id,selected,status)
          {
          axios.post('/categories-status-change', {id:id,data:selected, status:status}).then((response)=>{
            console.log(response.data);
            this.$store.dispatch("getCategories");
            //  this.selected=[];
            //  this.isSelected=false;
            //  this.selectedAll=false;
            toastr.success(response.data + " Category status change successfully",'Success');

          }).catch((error)=> {
            
        

        })
          },

          emptyData()
          {
            return (this.category.length < 1);
          },


          selectAll: function (event)
          {
            if(event.target.checked === false)
            {
              this.selected = [];
            }
            else{
              this.category.forEach((category)=>{
                  this.selected.push(category.id);
              });
            }
          }












        }
    }

</script>
