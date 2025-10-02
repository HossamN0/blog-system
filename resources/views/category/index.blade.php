<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="padding: 20px;">
                <form action="{{ route('category.create') }}" method="get">
                    <button type="submit"
                        style="background-color: blue; padding: 10px 16px; border-radius: 8px; border: none; cursor: pointer; color: white;">
                        Create Category
                    </button>
                </form>
                @foreach ($categories as $category)
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                        <h3 class="font-bold text-lg mb-2">{{ $category->name }}</h3>
                        <div>
                            <form method="post" action="{{ route('category.delete', $category->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="background-color: red; padding: 10px 16px; border-radius: 8px; border: none; cursor: pointer; color: white;">
                                    Delete Category
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>