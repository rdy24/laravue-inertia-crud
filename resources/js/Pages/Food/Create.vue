<template>
  <div>
    <Head title="Create Food" />
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/dashboard/food">Foods</Link>
      <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-5xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap -mb-2 -mr-6 p-6">
          <text-input v-model="form.name" :error="form.errors.name" class="pb-2 pr-6 w-full lg:w-1/2" label="Name" />
        </div>
        <div class="flex flex-wrap -mb-2 -mr-6 p-6">
          <SelectInput v-model="form.category_id" :error="form.errors.category_id" class="pb-2 pr-6 w-full lg:w-1/2" label="Category">
            <option v-for="category in categories.data" :value="category.id" :key="category.id">
              {{ category.name }}
            </option>
          </SelectInput>
        </div>
        <div class="flex flex-wrap -mb-2 -mr-6 p-6">
          <TextareaInput v-model="form.description" :error="form.errors.description" class="pb-2 pr-6 w-full lg:w-1/2" label="Description" />
        </div>
        <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Food</loading-button>
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
import TextareaInput from '@/Shared/TextareaInput.vue'
import SelectInput from '@/Shared/SelectInput.vue'

export default {
  components: {
    Head,
    Link,
    LoadingButton,
    TextInput,
    TextareaInput,
    SelectInput,
  },
  layout: Layout,
  props: {
    categories: Object,
  },
  remember: 'form',
  data() {
    return {
      form: router.form({
        name: '',
        category_id: '',
        description: '',
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/dashboard/food')
    },
  },
}
</script>
