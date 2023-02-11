<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="Youpay Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
      <span class="brand-text font-weight-light">Food App</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <Link href="/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>Beranda</p>
            </Link>
          </li>
          <li class="nav-header">Master</li>
          <li class="nav-item">
            <Link href="/dashboard/category" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Category</p>
            </Link>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
import { Link } from '@inertiajs/vue3'
export default {
  name: 'Sidebar',
  components: {
    Link,
  },
}
</script>
