@extends('layouts.admin-layout')

@section('children')
<div class="w-full">
    <div class="max-w-2xl mx-auto mt-10">
        <h2 class="text-2xl font-semibold text-gray-800">Add New Product</h2>
        <form action="{{url('admin/upload_product') }}" method="post" enctype="multipart/form-data" class="mt-5 space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>

            <div class="relative">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                <label for="image" class="border border-dashed flex items-center justify-center rounded-md cursor-pointer bg-gray-50 hover:bg-gray-200 transition-all">
                    <input type="file" accept="image/*" name="image" id="image" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                    <div id="placeholder" class="text-center text-gray-500 p-6">
                        <span>Drag and drop course thumbnail here or click to browse</span>
                    </div>
                    <img id="image-preview" class="!max-h-full w-full object-cover rounded-md border border-gray-300" style="display: none;">
                </label>
            </div>


            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                <input type="text" name="brand" id="brand" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add Product</button>
            </div>
        </form>
    </div>
</div>
@endsection