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
                      <th>Slug</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr v-for="cat in category">
                      <td>1.</td>
                      <td>{{cat.name}}</td>
                      <td>{{cat.slug}}</td>
                      <td><span class="badge bg-danger">55%</span></td>
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

        mounted() {
        	this.$store.dispatch("getCategories");
        },

        computed: {
        	category() {
        		return this.$store.getters.categories;
        	}
        }
    }

</script>
