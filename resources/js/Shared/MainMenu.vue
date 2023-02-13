<template>
  <div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard">
        <div :class="{ 'text-white': $page.url === '/dashboard', 'text-indigo-300 group-hover:text-white': $page.url !== '/dashboard' }"><i class="fas fa-clock mr-1"></i> Dashboard</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/category">
        <div :class="{ 'text-white': $page.url.startsWith('/dashboard/category'), 'text-indigo-300 group-hover:text-white': $page.url.startsWith('/dashboard') }"><i class="fas fa-file-alt mr-1"></i> Categories</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/dashboard/food">
        <div :class="{ 'text-white': $page.url.startsWith('/dashboard/food'), 'text-indigo-300 group-hover:text-white': $page.url.startsWith('/dashboard') }"><i class="fas fa-chart-bar mr-1"></i> Foods</div>
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
      return urls.includes(currentUrl)
    },
  },
}
</script>
