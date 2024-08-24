@extends('layouts.admin-layout')

@section('children')
<div class="w-full flex justify-between gap-5 mt-10 p-8 bg-white rounded-lg shadow-lg">
    <div class="w-1/2">

        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Add New Category</h2>

        <form action="{{url('admin/create_category')}}" method="post">
            @csrf
            <!-- Category Name -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2" for="category-name">Category Name</label>
                <input
                    type="text"
                    name="category_name"
                    id="category-name"
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
                    Add Category
                </button>
            </div>
        </form>

    </div>

    <div class="w-1/2 py-8">
        <h2 class="text-2xl font-semibold mb-6">Categories</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="border-b">
                    <tr class="flex justify-between w-full gap-2 ">
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">Name</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">Description</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">Slug</th>
                        <th class="py-2 px-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">Count</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($categories as $category)
                    <tr class="flex justify-between w-full gap-2 group">
                        <td class="py-2 px-3 whitespace-nowrap w-1/4">
                            <div>
                                {{$category->category_name}}
                            </div>
                            <div class="opacity-0 group-hover:opacity-100 flex gap-5 items-center text-[13px]">
                                <a href="{{ url('/admin/edit_category', $category->id) }}">
                                    edit
                                </a>
                                <a href="{{ url('/admin/delete_category', $category->id) }}" onclick="confirmation(event, 'Are you sure you want to delete this category?')">
                                    delete
                                </a>
                            </div>
                        </td>
                        <td class="py-2 px-3 whitespace-nowrap w-1/4">@if ($category->description)
                       {{ $category->description}}
                        @else
                        __
                        @endif</td>
                        <td class="py-2 px-3 whitespace-nowrap w-1/4">{{Str::slug($category->category_name)}}</td>
                        <td class="py-2 px-3 whitespace-nowrap w-1/4 text-center">@if ($category->count)
                        {{$category->count}}
                        @else
                        0
                        @endif</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection