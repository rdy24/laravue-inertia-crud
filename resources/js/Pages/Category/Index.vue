<template>
  <Layout>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="/category/create" class="btn btn-primary">
                    <i class="nav-icon far fa-plus-square"></i>
                    Tambah
                  </a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="category in categories" :key="category.id">
                      <td>{{ category.name }}</td>
                      <td>a</td>
                      <td>
                        <form action="/" method="POST">
                          <a href="/" class="btn btn-info btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                            Ubah
                          </a>
                          <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                            Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </Layout>
</template>

<script>
import Layout from '../../Shared/Layout.vue'

export default {
  name: 'CategoryIndex',
  components: {
    Layout,
  },
  props: {
    categories: Array,
  },
  mounted() {
    $('#example2').DataTable({
      paging: true,
      lengthChange: false,
      searching: false,
      ordering: true,
      info: true,
      autoWidth: false,
      responsive: true,
    })
  },
}
</script>
