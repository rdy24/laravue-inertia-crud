<template>
  <!-- Site wrapper -->
  <div class="wrapper">
    <Navbar />

    <!-- Main Sidebar Container -->
    <Sidebar />

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <slot />
    </div>
    <!-- /.content-wrapper -->

    <Footer />
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
</template>

<style></style>

<script>
import { Link } from '@inertiajs/vue3'
import Navbar from '../Components/Navbar.vue'
import Footer from '../Components/Footer.vue'
import Sidebar from '../Components/Sidebar.vue'

export default {
  name: 'Layout',
  components: {
    Link,
    Navbar,
    Footer,
    Sidebar,
  },
}
</script>
