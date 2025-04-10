<div x-data="searchModal()" x-init="init()" @keydown.window.escape="close()" class="relative">
  <!-- 検索ボタン -->
  <button
    @click="open()"
    class="flex items-center gap-2 px-3 py-2 text-sm rounded-full bg-[#2A2A2A] text-[#E0E0E0] hover:bg-[#3A3A3A] transition-all duration-300"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
      stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
    </svg>
    <span>検索...</span>
    <kbd class="hidden sm:inline-flex ml-2 items-center rounded border border-gray-600 px-1.5 text-xs text-gray-400">
      ⌘K
    </kbd>
  </button>

  <!-- モーダル -->
  <div
    x-show="isOpen"
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center p-4 backdrop-blur-sm bg-black/50"
    @click.outside="close()"
  >
    <div
      x-show="isOpen"
      x-transition
      class="w-full max-w-md transform rounded-xl bg-gradient-to-br from-[#1E1E1E] to-[#2A2A2A] p-6 shadow-2xl ring-1 ring-gray-700"
    >
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold bg-gradient-to-r from-[#81D4FA] to-[#4FC3F7] bg-clip-text text-transparent">
          検索
        </h2>
        <button @click="close()" class="rounded-full p-1.5 text-gray-400 hover:bg-gray-700 transition-colors">
          ✕
        </button>
      </div>

      <form @submit.prevent="submitSearch" class="relative">
        <div class="relative">
          <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" width="18" height="18"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
          </svg>
          <input
            type="text"
            x-model="query"
            placeholder="キーワードを入力..."
            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-700 bg-[#1A1A1A] text-[#E0E0E0] placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#81D4FA] transition-all"
          />
        </div>

        <div class="mt-4 flex justify-end space-x-2">
          <button type="button" @click="close()" class="px-4 py-2 rounded-lg border border-gray-700 text-gray-300 hover:bg-gray-700 transition-colors">
            キャンセル
          </button>
          <button type="submit" class="px-4 py-2 rounded-lg bg-gradient-to-r from-[#81D4FA] to-[#4FC3F7] text-[#121212] font-medium hover:shadow-lg transition-all">
            検索
          </button>
        </div>
      </form>

      <template x-if="query">
        <div class="mt-4 pt-4 border-t border-gray-700">
          <p class="text-sm text-gray-400 mb-2">検索候補:</p>
          <template x-for="(suggestion, index) in suggestions" :key="index">
            <button
              @click="selectSuggestion(suggestion)"
              class="w-full text-left px-3 py-2 rounded-md hover:bg-[#3A3A3A] text-gray-300 transition-colors"
              x-text="suggestion"
            ></button>
          </template>
        </div>
      </template>

      <template x-if="results.length > 0">
        <div class="mt-4 pt-4 border-t border-gray-700">
          <h3 class="text-lg font-semibold text-[#81D4FA]">検索結果</h3>
          <ul class="mt-2 space-y-2">
            <template x-for="(result, index) in results" :key="index">
              <li class="text-gray-300">
                <template x-if="result.type === 'user'">
                  <span x-text="'ユーザー: ' + result.name"></span>
                </template>
                <template x-if="result.type === 'post'">
                  <a :href="'/posts/' + result.id" class="text-[#81D4FA] hover:underline" x-text="'メモ: ' + result.title"></a>
                </template>
              </li>
            </template>
          </ul>
        </div>
      </template>

      <template x-if="results.length === 0 && query">
        <p class="mt-4 text-gray-400">該当する結果が見つかりませんでした。</p>
      </template>
    </div>
  </div>
</div>

<script>
  function searchModal() {
    return {
      isOpen: false,
      query: '',
      suggestions: [],
      results: [],

      open() {
        this.isOpen = true;
        this.$nextTick(() => {
          const input = this.$el.querySelector('input');
          if (input) input.focus();
        });
      },

      close() {
        this.isOpen = false;
        this.query = '';
        this.results = [];
        this.suggestions = [];
      },

      init() {
        // 初期化時の処理
      },

      selectSuggestion(suggestion) {
        this.query = suggestion;
        this.submitSearch();
      },

      async submitSearch() {
        if (!this.query) return;

        try {
          const response = await fetch('/search', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ query: this.query })
          });

          if (!response.ok) throw new Error('検索に失敗しました。');

          const data = await response.json();
          this.results = data.results || [];
        } catch (error) {
          console.error(error);
          this.results = [];
        }
      }
    };
  }
</script>
