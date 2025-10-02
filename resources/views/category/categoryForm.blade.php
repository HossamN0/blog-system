<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="padding: 20px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ isset($category) ? route('category.edit', $category->id) : route('category.create') }}" method="POST">
                    @csrf
                    @if (isset($category))
                        @method('PUT')
                    @endif
                    <input value="{{ old('name', $category->name ?? '') }}" type="text" name="name" placeholder="Category Name"
                        class="border border-gray-300 rounded-md p-2 w-full mb-4">
                    <button type="submit"
                        style="background-color: blue; padding: 10px 16px; border-radius: 8px; border: none; cursor: pointer; color: white;">
                        {{ isset($category) ? 'Update Category' : 'Create Category' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>