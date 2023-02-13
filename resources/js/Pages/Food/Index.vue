<template>
  <div>
    <Head title="Foods" />
    <h1 class="mb-8 text-3xl font-bold">Foods</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset"> </search-filter>
      <Link class="btn-indigo" href="/dashboard/food/create">
        <span>Create Food</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Nama Makanan</th>
          <th class="pb-4 pt-6 px-6">Kategori</th>
          <th class="pb-4 pt-6 px-6">Action</th>
        </tr>
        <tr v-for="food in foods.data" :key="food.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t items-center px-6 py-4">{{ food.data.name }}</td>
          <td class="border-t items-center px-6 py-4">{{ food.data.category.name }}</td>
          <td class="border-t">
            <div class="flex gap-3">
              <Link :href="`/dashboard/food/${food.data.uuid}/edit`" class="bg-yellow-600 hover:bg-yellow-700 rounded px-3 py-2 text-white">
                <i class="fas fa-pen"></i>
              </Link>
              <Link :href="`/dashboard/food/${food.data.uuid}`" class="bg-green-600 hover:bg-green-700 rounded px-3 py-2 text-white">
                <i class="fas fa-eye"></i>
              </Link>
              <button class="bg-red-600 rounded px-3 py-2 hover:bg-red-700 text-white" tabindex="-1" type="button" @click.prevent="destroy(`${food.data.uuid}`)">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        <tr v-if="foods.data.length === 0">
          <td class="px-6 py-4 border-t text-center" colspan="2">No foods found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="foods.links" />
  </div>
</template>

<script>
import { Head, Link, router } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout.vue'
import throttle from 'lodash/throttle'
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
    foods: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        router.get('/dashboard/food', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
    destroy(uuid) {
      if (confirm('Are you sure you want to delete this food?')) {
        router.delete(`/dashboard/food/${uuid}`)
      }
    },
  },
}
</script>
