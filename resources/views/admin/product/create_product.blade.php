@extends('layouts.admin-layout')

@section('children')
<div class="w-full">
    <div class="max-w-2xl mx-auto mt-10">
        <h2 class="text-2xl font-semibold text-gray-800">Add New Product</h2>
        <form action="{{ url('admin/upload_product') }}" method="post" enctype="multipart/form-data" class="mt-5 space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('title') }}">
                @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Image Upload -->
            <div class="relative">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                <label for="image" class="border border-dashed flex items-center justify-center rounded-md cursor-pointer bg-gray-50 hover:bg-gray-200 transition-all">
                    <input type="file" accept="image/*" name="image" id="image" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                    <div id="placeholder" class="text-center text-gray-500 p-6">
                        <span>Drag and drop course thumbnail here or click to browse</span>
                    </div>
                    <img id="image-preview" class="!max-h-full w-full object-cover rounded-md border border-gray-300" style="display: none;">
                </label>
                @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_name }}" {{ old('category') == $category->category_name ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Regular Price -->
            <div>
                <label for="regular_price" class="block text-sm font-medium text-gray-700">Regular Price</label>
                <input type="number" name="regular_price" id="regular_price" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('regular_price') }}">
                @error('regular_price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Discount Price -->
            <div>
                <label for="discount_price" class="block text-sm font-medium text-gray-700">Discount Price</label>
                <input type="number" name="discount_price" id="discount_price" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('discount_price') }}">
                @error('discount_price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Quantity -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('quantity') }}">
                @error('quantity') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Brand -->
            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                <input type="text" name="brand" id="brand" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('brand') }}">
                @error('brand') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Flash Sale -->
            <div>
                <label for="flash_sale" class="flex items-center space-x-3">
                    <input type="checkbox" name="flash_sale" id="flash_sale" class="h-4 w-4 border-gray-300 rounded" {{ old('flash_sale') ? 'checked' : '' }}>
                    <span class="text-sm font-medium text-gray-700">Flash Sale</span>
                </label>
                @error('flash_sale') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Specifications -->
            <div>
                <label for="specifications" class="block text-sm font-medium text-gray-700">Specifications</label>
                <textarea name="specifications" id="specifications" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('specifications') }}</textarea>
                @error('specifications') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Stock Quantity -->
            <div>
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                <input type="number" name="stock_quantity" id="stock_quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('stock_quantity') }}">
                @error('stock_quantity') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add Product</button>
            </div>
        </form>
    </div>
</div>
@endsection