
<div x-data="notificationModal()" x-init="init()" class="relative">
  <button @click="open()" class="relative text-white hover:cursor-pointer border-1 border-gray-600 rounded-full p-2">
    <x-heroicon-o-bell class="w-6 h-6" />
    <template x-if="unreadCount > 0">
      <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full px-1.5">
        <span x-text="unreadCount"></span>
      </span>
    </template>
  </button>

  <div x-show="isOpen" x-transition.opacity class="fixed inset-0 backdrop-blur-sm bg-black/50 flex items-center justify-center z-50">
    <div class="bg-gray-800 p-6 rounded-lg w-full max-w-md text-white relative" @click.outside="close()">
      <h2 class="text-xl font-bold mb-4">通知</h2>
      <div class="flex justify-between mb-2">
        <button @click="activeTab = 'all'" :class="activeTab === 'all' ? 'font-bold' : ''">すべて</button>
        <button @click="activeTab = 'unread'" :class="activeTab === 'unread' ? 'font-bold' : ''">未読</button>
        <button @click="markAllAsRead()" class="text-sm text-blue-400">すべて既読</button>
      </div>

      <template x-if="filteredNotifications.length === 0">
        <p class="text-sm text-gray-400">通知はありません。</p>
      </template>

      <div class="space-y-3 max-h-80 overflow-y-auto">
        <template x-for="notification in filteredNotifications" :key="notification.id">
          <div
            :class="{'bg-gray-700': !notification.read}"
            class="p-3 border rounded cursor-pointer"
            @click="markAsRead(notification.id)"
          >
            <div class="flex justify-between">
              <div>
                <h3 class="font-semibold" x-text="notification.title"></h3>
                <p class="text-sm text-gray-300" x-text="notification.message"></p>
                <p class="text-xs text-gray-500" x-text="formatDate(notification.created_at)"></p>
              </div>
              <span class="text-xs px-2 py-1 rounded" :class="getStyle(notification.type)" x-text="getTypeLabel(notification.type)"></span>
            </div>
          </div>
        </template>
      </div>

      <button @click="close()" class="absolute top-2 right-2 text-gray-400 hover:text-white hover:cursor-pointer">✕</button>
    </div>
  </div>
</div>

<script>
  function notificationModal() {
    return {
      isOpen: false,
      notifications: [],
      activeTab: 'all',
      query: '',
      init() {
        this.fetch()
      },
      open() {
        this.isOpen = true
        this.fetch()
      },
      close() {
        this.isOpen = false
      },
      get unreadCount() {
        return this.notifications.filter(n => !n.read).length
      },
      get filteredNotifications() {
        return this.activeTab === 'unread'
          ? this.notifications.filter(n => !n.read)
          : this.notifications
      },
      async fetch() {
        try {
          const res = await fetch('/notifications')
          this.notifications = await res.json()
        } catch (e) {
          console.error(e)
        }
      },
      async markAsRead(id) {
        await fetch(`/notifications/${id}/read`, { method: 'POST' })
        this.notifications = this.notifications.map(n => n.id === id ? { ...n, read: true } : n)
      },
      async markAllAsRead() {
        await fetch(`/notifications/read-all`, { method: 'POST' })
        this.notifications = this.notifications.map(n => ({ ...n, read: true }))
      },
      formatDate(dateStr) {
        return new Date(dateStr).toLocaleString('ja-JP')
      },
      getStyle(type) {
        const map = {
          info: 'bg-blue-100 text-blue-800',
          warning: 'bg-yellow-100 text-yellow-800',
          success: 'bg-green-100 text-green-800',
          error: 'bg-red-100 text-red-800',
        }
        return map[type] || 'bg-gray-100 text-gray-800'
      },
      getTypeLabel(type) {
        return { info: 'お知らせ', warning: '警告', success: '成功', error: 'エラー' }[type]
      },
    }
  }
</script>
