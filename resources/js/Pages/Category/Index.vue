<template>
  <div>
    <Head title="Dashboard" />
    <h1 class="mb-8 text-3xl font-bold">Contacts</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset"> </search-filter>
      <Link class="btn-indigo" href="/dashboard/category/create">
        <span>Create Category</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Name</th>
          <th class="pb-4 pt-6 px-6">Action</th>
        </tr>
        <tr v-for="category in categories.data" :key="category.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t items-center px-6 py-4">{{ category.name }}</td>
          <td class="border-t">
            <div class="flex gap-3">
              <Link :href="`/dashboard/category/${category.uuid}/edit`" class="bg-yellow-300 hover:bg-yellow-500 rounded px-3 py-2">Edit</Link>
              <button class="bg-red-600 rounded px-3 py-2 hover:bg-red-700 text-white" tabindex="-1" type="button" @click.prevent="destroy(`${category.uuid}`)">Delete</button>
            </div>
          </td>
        </tr>
        <tr v-if="categories.data.length === 0">
          <td class="px-6 py-4 border-t text-center" colspan="2">No categories found.</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="categories.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
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
    categories: Array,
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
        this.$inertia.get('/dashboard/category', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
    destroy(uuid) {
      if (confirm('Are you sure you want to delete this category?')) {
        this.$inertia.delete(`/dashboard/category/${uuid}`)
      }
    },
  },
  created() {
    console.log(this.categories.links)
  },
}
</script>
