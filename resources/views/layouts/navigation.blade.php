<nav>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{-- 他のナビゲーションリンク --}}


        {{-- ログイン/ログアウトボタン --}}
        <div class="flex items-center justify-end">
            @if (Auth::guest())
                <a href="{{ route('login') }}" class="login-link text-sm text-gray-700 underline">ログイン</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="register-link ml-4 text-sm text-gray-700 underline">登録</a>
                @endif
            @else
                <span class="username">{{ Auth::user()->name }}</span>

                <a href="{{ route('logout') }}"
                class="logout-button"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endif
        </div>
    </div>
</nav>
