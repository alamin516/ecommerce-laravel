@extends('layouts.admin-layout')

@section('children')
<div class="w-full">
    <div class="max-w-lg mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Category</h2>

        <form action="{{url('admin/update_category', $category->id)}}" method="post">
            @csrf
            <!-- Category Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2" for="category-name">Category Name</label>
                <input
                    type="text"
                    id="category-name"
                    name="category_name"
                    value="{{$category->category_name}}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-900"
                    placeholder="Enter category name"
                    required />

            </div>

            <!-- Category Slug -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2" for="category-slug">Category Slug</label>
                <input
                    type="text"
                    id="category-slug"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-900"
                    placeholder="Enter category slug" />
            </div>

            <!-- Category Description -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2" for="category-description">Description</label>
                <textarea
                    id="category-description"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-900"
                    rows="4"
                    placeholder="Enter category description"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>


@endsection