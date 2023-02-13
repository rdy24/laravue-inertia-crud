<template>
  <div>
    <Head title="Create Category" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/category">Categories</Link>
      <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-5xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.name" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Name" />
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Category</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link, router } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout.vue'
import TextInput from '@/Shared/TextInput.vue'
import LoadingButton from '@/Shared/LoadingButton.vue'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    TextInput,
  },
  layout: Layout,
  remember: 'form',
  data() {
    return {
      form: router.form({
        name: '',
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/dashboard/category')
    },
  },
}
</script>
