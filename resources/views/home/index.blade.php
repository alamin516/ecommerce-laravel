<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <!-- Include the slider partial -->
        @include('home.slider')

        <div class="py-10">
            <h2 class="text-xl font-bold mb-4">
                Categories
            </h2>
            @include('home.categories-slider')
        </div>

        <div class="py-5">
            <h2 class="text-xl font-bold mb-4">
                Featured Products
            </h2>
            <div class="grid grid-cols-6">
                @foreach ($products as $product)
                @include('home.featured-products')
                @endforeach
            </div>
        </div>

        <div class="py-5">
            <h2 class="text-xl font-bold mb-4">
                Best Selling
            </h2>
            <div class="grid grid-cols-6">
                @foreach ($products as $product)
                @include('home.featured-products')
                @endforeach
            </div>
        </div>

        <div class="py-5">
            <h2 class="text-xl font-bold mb-4">
                New Products
            </h2>
            <div class="grid grid-cols-6">
                @foreach ($products as $product)
                @include('home.featured-products')
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>