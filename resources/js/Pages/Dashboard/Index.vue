<template>
  <div>
    <Head title="Dashboard" />
    <h1 class="mb-8 text-3xl font-bold">Dashboard</h1>
    <div class="flex flex-col gap-y-6 md:flex-row md:gap-x-6">
      <div class="w-full h-44 bg-orange-500 rounded md:w-64">
        <div class="flex flex-col justify-center items-center h-full px-4 gap-2 text-white">
          <i class="far fa-list-alt text-3xl"></i>
          <h2 class="text-2xl font-bold">Total Category</h2>
          <h3 class="text-3xl font-bold">{{ category }}</h3>
        </div>
      </div>
      <div class="w-full h-44 bg-green-500 rounded md:w-64">
        <div class="flex flex-col justify-center items-center h-full px-4 gap-2 text-white">
          <i class="fas fa-bacon text-3xl"></i>
          <h2 class="text-2xl font-bold">Total Food</h2>
          <h3 class="text-3xl font-bold">{{ food }}</h3>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Head } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'

export default {
  layout: Layout,
  components: {
    Head,
  },
  props: {
    category: String,
    food: String,
  },
}
</script>
