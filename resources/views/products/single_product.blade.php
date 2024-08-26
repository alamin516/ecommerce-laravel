<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Image Gallery -->
            <div class="space-y-4">
                <div class="relative w-full h-96">
                    <img src="{{ asset('upload/' . basename($product->image)) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg shadow-md">
                </div>

                <!-- Thumbnail Images -->
                <div class="flex space-x-4">
                    <div class="w-24 h-24 cursor-pointer hover:opacity-75">
                        <img src="{{ asset('upload/' . basename($product->image)) }}" alt="Thumbnail" class="w-full h-full object-cover rounded-lg shadow-md">
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-6">
                <h1 class="text-3xl font-bold text-gray-900">{{ $product->title }}</h1>
                <p class="text-xl font-semibold text-gray-800">${{ number_format($product->regular_price, 0, '.', ',')}}</p>

                <div class="space-y-4">
                    <p class="text-gray-700">{{Str::limit($product->description, 200)}}</p>

                    <!-- Product Attributes -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Features:</h2>
                        <!-- Example static features, adjust according to your product model -->
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>High-quality material</li>
                            <li>Available in multiple colors</li>
                            <li>Free shipping on orders over $50</li>
                        </ul>
                    </div>
                </div>

                <!-- Add to Cart and Wishlist Buttons -->
                <div class="flex space-x-4">
                    <button class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200">Add to Cart</button>
                    <button class="px-6 py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-300 transition duration-200">Add to Wishlist</button>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <!-- Product Reviews -->
            <div class="w-[50%]">
                <h2 class="text-lg font-semibold text-gray-900">Customer Reviews:</h2>
                <div class="space-y-4">
                    <!-- Example static reviews, you can make this dynamic as well -->
                    <div class="border-t border-gray-200 pt-4">
                        <p class="font-semibold">John Doe</p>
                        <p class="text-gray-600">⭐⭐⭐⭐⭐</p>
                        <p class="text-gray-700">Amazing product! Worth every penny.</p>
                    </div>
                    <div class="border-t border-gray-200 pt-4">
                        <p class="font-semibold">Jane Smith</p>
                        <p class="text-gray-600">⭐⭐⭐⭐</p>
                        <p class="text-gray-700">Good quality, but a bit pricey.</p>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="my-10">
                <h2 class="text-lg font-semibold text-gray-900">Related Products:</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                    <!-- Example Related Product Card -->
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('upload/' . basename($product->image)) }}" alt="{{ $product->title }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $product->title }}</h3>
                            <p class="text-gray-700">${{ number_format($product->regular_price, 0, '.', ',')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>