<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{url('/')}}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>

    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{url('/dashboard')}}" class="flex items-center {{ request()->is('dashboard') ? 'active-nav-link' : '' }}  text-white py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>

        <a href="{{route('products.index')}}" class="flex items-center {{ request()->is('products') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Products
        </a>
        <a href="{{route('products.create')}}" class="flex items-center {{ request()->is('products/create') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Add Products
        </a>


    </nav>

</aside>

