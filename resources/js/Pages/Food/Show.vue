<template>
  <div>
    <Head title="Detail Food" />
    <div class="flex items-center mb-6 gap-x-5">
      <Link class="btn-indigo" href="/dashboard/food">
        <span>Back</span>
      </Link>
      <h1 class="text-3xl font-bold">Detail {{ food.data.name }}</h1>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full">
        <tr class="text-left">
          <td class="pb-4 pt-6 px-6 font-bold whitespace-nowrap">Nama Makanan</td>
          <td class="pb-4 pt-6 px-6">{{ food.data.name }}</td>
        </tr>
        <tr class="text-left">
          <td class="pb-4 pt-6 px-6 font-bold whitespace-nowrap">Deskripsi</td>
          <td class="pb-4 pt-6 px-6">
            {{ food.data.description }}
          </td>
        </tr>
        <tr class="text-left">
          <td class="pb-4 pt-6 px-6 font-bold whitespace-nowrap">Kategory</td>
          <td class="pb-4 pt-6 px-6">{{ food.data.category.name }}</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import Layout from '@/Shared/Layout.vue'
import Pagination from '@/Shared/Pagination.vue'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
  },
  layout: Layout,
  props: {
    filters: Object,
    food: Object,
  },
}
</script>
