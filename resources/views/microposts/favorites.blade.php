<div class="mt-4">
    @if (isset($favorite_microposts))
        <ul class="list-none">
            @foreach ($favorite_microposts as $favorite_micropost)
                <li class="flex items-start gap-x-2 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <div class="avatar">
                        <div class="w-12 rounded">
                            <img src="{{ Gravatar::get($favorite_micropost->user->email) }}" alt="" />
                        </div>
                    </div>
                    <div>
                        <div>
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <a class="link link-hover text-info" href="{{ route('users.show', $favorite_micropost->user->id) }}">{{ $favorite_micropost->user->name }}</a>
                            <span class="text-muted text-gray-500">posted at {{ $favorite_micropost->created_at }}</span>
                        </div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($favorite_micropost->content)) !!}</p>
                        </div>
                        <div>
                            @if (Auth::id() == $favorite_micropost->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('microposts.destroy', $favorite_micropost->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm normal-case" 
                                        onclick="return confirm('Delete id = {{ $favorite_micropost->id }} ?')">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div>
                        @include('microposts_favorites.favorites_button')
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $microposts->links() }}
    @endif
</div>