<template>
  <div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard">
        <div :class="isUrl('dashboard') ? 'text-white' : 'text-indigo-300 group-hover:text-white'"><i class="fas fa-clock mr-1"></i> Dashboard</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/category">
        <div :class="isUrl('category') ? 'text-white' : 'text-indigo-300 group-hover:text-white'"><i class="fas fa-file-alt mr-1"></i> Categories</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/food">
        <div :class="isUrl('contacts') ? 'text-white' : 'text-indigo-300 group-hover:text-white'"><i class="fas fa-chart-bar mr-1"></i> Foods</div>
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon.vue'

export default {
  name: 'MainMenu',
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
