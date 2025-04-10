<div>

  @if (!empty($results))
    <div class="mt-4 pt-4 border-t border-gray-700">
      <h3 class="text-lg font-semibold text-[#81D4FA]">検索結果</h3>
      <ul class="mt-2 space-y-2">
        @foreach ($results as $result)
          <li class="text-gray-300">
            @if ($result['type'] === 'user')
              <span>ユーザー: {{ $result['name'] }}</span>
            @elseif ($result['type'] === 'post')
              <a href="/posts/{{ $result['id'] }}" class="text-[#81D4FA] hover:underline">メモ: {{ $result['title'] }}</a>
            @endif
          </li>
        @endforeach
      </ul>
    </div>
  @else
    <p class="mt-4 text-gray-400">該当する結果が見つかりませんでした。</p>
  @endif
</div>
