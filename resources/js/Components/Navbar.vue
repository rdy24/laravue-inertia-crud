<template>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#"> {{ $page.props.auth.user.name }} </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <DropdownLink :href="route('logout')" method="post" as="button"> Log Out </DropdownLink>
          <!-- <a href="/logout" class="dropdown-item"> Logout </a> -->
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
</template>

<script>
import DropdownLink from '../Components/DropdownLink.vue'
export default {
  name: 'Navbar',
  components: {
    DropdownLink,
  },
}
</script>
