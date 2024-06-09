<nav class="flex justify-between items-center p-4 bg-white">
    <div class="flex items-center space-x-4">
        <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">
            HOME
        </a>
        <ul class="flex space-x-4">
            <li>
                <a href="{{ route('products.index') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">
                    PRODUCTS
                </a>
            </li>
        </ul>
    </div>
    <div class="flex items-center space-x-4">
        @auth
            <a href="{{ route('logout') }}"
                data-method="POST"
                class="text-lg font-semibold text-gray-700 hover:text-gray-900">
                Logout
            </a>
        @else
            <a href="{{ route('login') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">
                Login
            </a>
            <a href="{{ route('register') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">
                Register
            </a>
        @endauth
    </div>
</nav>
