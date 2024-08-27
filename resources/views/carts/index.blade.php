<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Your Cart</h2>

        @if($carts->isEmpty())
        <p class="text-center text-gray-500">Your cart is empty.</p>
        @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-600">
                        <th class="px-4 py-3">
                            <input type="checkbox" id="select-all" class="form-checkbox h-5 w-5 text-blue-600">
                        </th>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $value = 0

                    ?>
                    @foreach($carts as $cart)
                    <tr class="border-t border-gray-200">
                        <td class="px-4 py-3 text-center">
                            <input type="checkbox" name="selected[]" value="{{ $cart->id }}" class="form-checkbox h-5 w-5 text-blue-600">
                        </td>
                        <td class="px-4 py-3">
                            <img src="{{asset('upload/' . basename($cart->product->image)) }}" alt="{{ $cart->product->title }}" class="h-16 w-16 object-cover rounded-md">
                        </td>
                        <td class="px-4 py-3">{{ $cart->product->title }}</td>
                        <td class="px-4 py-3">{{ $cart->id }}</td>
                        <td class="px-4 py-3">${{ number_format($cart->product->regular_price)}}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center">
                                <button class="text-gray-600 focus:outline-none" onclick="decreaseQty('{{ $cart->id }}')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <input type="text" name="quantity[{{ $cart->id }}]" value="{{ 1 }}" class="mx-2 w-12 text-center border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <button class="text-gray-600 focus:outline-none" onclick="increaseQty('{{ $cart->id }}')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                        <td class="px-4 py-3">${{ $cart->product->regular_price * 1 }}</td>
                        <td class="px-4 py-3">
                            <button class="text-red-600 hover:text-red-800 focus:outline-none" onclick="removeItem('{{ $cart->id }}')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <?php
                    $value = $value + $cart->product->regular_price

                    ?>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-end items-center py-5">
            <div class="w-[25%] space-y-2">
                <?php
                $tax = $value * .10;
                $shipping_charge = 100;
                $total = $value + $tax + $shipping_charge;
                ?>
                <h3 class="text-black font-semibold flex justify-between">
                    <span>Total Price: </span>
                    <span>{{ number_format($value) }}
                </h3></span>
                <h3 class="text-black font-semibold flex justify-between">
                    <span>Tax: </span>
                    <span>{{number_format($tax)}}
                </h3></span>
                <h3 class="text-black font-semibold flex justify-between">
                    <span>Shipping: </span>
                    <span>{{number_format($shipping_charge)}}
                </h3></span>
                <h3 class="text-black font-semibold flex justify-between border-t">
                    <span>Sub-Total:</span>
                    <span>{{number_format($total)}}
                </h3></span>

                <div class="text-right py-10">
                    <button class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none" onclick="proceedToCheckout()">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script>
        function decreaseQty(id) {
            // Decrease quantity logic here
        }

        function increaseQty(id) {
            // Increase quantity logic here
        }

        function removeItem(id) {
            // Remove item logic here
        }

        function proceedToCheckout() {
            // Proceed to checkout logic here
        }
    </script>

</x-app-layout>