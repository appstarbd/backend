<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                        <div>
                            <x-label for="title" :value="__('Title / Name')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $product->title }}" required autofocus />
                        </div>

                        <!-- Price Address -->
                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')" />
                            <x-input id="price" class="block mt-1 w-full" type="number" step="any" name="price" value="{{ $product->price }}" required />
                        </div>

                        <!-- Description Address -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <textarea id="description" class="block mt-1 w-full" name="description" required>{{ $product->description }}</textarea>

                        <!-- Image Address -->
                        <div class="mt-4">
                            <x-label for="image" :value="__('Image')" />
                            <div>
                                <img src="{{ storage_path(is_null($product->image) ?: $product->image->image) }}" />
                            </div>
                            <input id="image" class="blockX mt-1 w-fullX" type="file" name="images" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('product.index') }}">
                                {{ __('Cancel') }}
                            </a>
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    @push('styles')--}}
{{--        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
{{--    @endpush--}}

{{--    @push('scripts')--}}
{{--        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>--}}
{{--    @endpush--}}
</x-app-layout>
