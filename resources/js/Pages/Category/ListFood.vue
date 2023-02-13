<template>
  <div>
    <Head title="List Food" />
    <div class="flex items-center mb-6 gap-x-5">
      <Link class="btn-indigo" href="/dashboard/category">
        <span>Back</span>
      </Link>
      <h1 class="text-3xl font-bold">List Foods</h1>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Makanan</th>
        </tr>
        <tr v-for="food in foods.data" :key="food.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t items-center px-6 py-4">{{ food.name }}</td>
        </tr>
        <tr v-if="foods.length === 0">
          <td class="px-6 py-4 border-t text-center" colspan="1">No foods found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="foods.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import Layout from '@/Shared/Layout.vue'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination.vue'
import SearchFilter from '@/Shared/SearchFilter.vue'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    foods: Array,
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
