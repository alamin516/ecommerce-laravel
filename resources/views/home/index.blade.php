<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <!-- Include the slider partial -->
        @include('home.slider')

        <div class="py-10 px-5 lg:px-0">
            <h2 class="text-xl font-bold mb-4">
                Categories
            </h2>
            <div class="categories-slider grid lg:grid-cols-8 md:grid-cols-6 grid-cols-2">
                @foreach ( $categories as $category)
                @include('home.categories-slider')
                @endforeach
            </div>
        </div>

        <div class="py-5 px-5 lg:px-0">
            <h2 class="text-xl font-bold mb-4">
                Featured Products
            </h2>
            <div class="grid lg:grid-cols-6 md:grid-cols-6 grid-cols-2">
                @foreach ($products as $product)
                @include('home.featured-products')
                @endforeach
            </div>
        </div>

        <div class="py-5 px-5 lg:px-0">
            <h2 class="text-xl font-bold mb-4">
                Best Selling
            </h2>
            <div class="grid lg:grid-cols-6 md:grid-cols-6 grid-cols-2">
                @foreach ($products as $product)
                @include('home.featured-products')
                @endforeach
            </div>
        </div>

        <div class="py-5 px-5 lg:px-0">
            <h2 class="text-xl font-bold mb-4">
                New Products
            </h2>
            <div class="grid lg:grid-cols-6 md:grid-cols-6 grid-cols-2">
                @foreach ($products as $product)
                @include('home.featured-products')
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>