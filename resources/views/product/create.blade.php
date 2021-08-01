<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                        <div>
                            <x-label for="title" :value="__('Title / Name')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <!-- Price Address -->
                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')" />

                            <x-input id="price" class="block mt-1 w-full" type="number" step="any" name="price" :value="old('price')" required />
                        </div>

                        <!-- Description Address -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

{{--                            <x-editor id="description" class="block mt-1 w-full" type="email" name="description" :value="old('description')" required />--}}
                            <textarea id="description" class="block mt-1 w-full" name="description" required></textarea>

{{--                            <div class="mt-2 bg-white">--}}
{{--                                <div--}}
{{--                                    x-data--}}
{{--                                    x-ref="quillEditor"--}}
{{--                                    x-init="--}}
{{--         quill = new Quill($refs.quillEditor, {theme: 'snow'});--}}
{{--         quill.on('text-change', function () {--}}
{{--           $dispatch('input', quill.root.innerHTML);--}}
{{--         });--}}
{{--       ">--}}
{{--                                </div>--}}

{{--                        </div>--}}

                        <!-- Image Address -->
                        <div class="mt-4">
                            <x-label for="image" :value="__('Image')" />

{{--                            <x-input id="image" class="block mt-1 w-full" type="file" name="image" required />--}}
{{--                            <x-uploader />--}}
{{--                            <div class="h-full overflow-auto w-full h-full flex flex-col">--}}
{{--                                <ul id="gallery" class="flex flex-1 flex-wrap">--}}
{{--                                    <li id="empty" class="border-dashed border-2 border-gray-400 h-full w-full cursor-pointer text-center flex flex-col items-center justify-center items-center">--}}
{{--                                        <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />--}}
{{--                                        </svg>--}}
{{--                                        <span class="text-small text-gray-500">No files selected</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

                            <input id="image" class="blockX mt-1 w-fullX" type="file" name="images" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('product.index') }}">
                                {{ __('Cancel') }}
                            </a>
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>

{{--                    <div class="flex">--}}
{{--                        <div class="flex-none w-48 relative">--}}
{{--                            <img src="/classic-utility-jacket.jpg" alt="" class="absolute inset-0 w-full h-full object-cover" />--}}
{{--                        </div>--}}
{{--                        <form class="flex-auto p-6">--}}
{{--                            <div class="flex flex-wrap">--}}
{{--                                <h1 class="flex-auto text-xl font-semibold">--}}
{{--                                    Classic Utility Jacket--}}
{{--                                </h1>--}}
{{--                                <div class="text-xl font-semibold text-gray-500">--}}
{{--                                    $110.00--}}
{{--                                </div>--}}
{{--                                <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">--}}
{{--                                    In stock--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-baseline mt-4 mb-6">--}}
{{--                                <div class="space-x-2 flex">--}}
{{--                                    <label>--}}
{{--                                        <input class="w-9 h-9 flex items-center justify-center bg-gray-100 rounded-lg" name="size" type="radio" value="xs" checked>--}}
{{--                                        XS--}}
{{--                                    </label>--}}
{{--                                    <label>--}}
{{--                                        <input class="w-9 h-9 flex items-center justify-center" name="size" type="radio" value="s">--}}
{{--                                        S--}}
{{--                                    </label>--}}
{{--                                    <label>--}}
{{--                                        <input class="w-9 h-9 flex items-center justify-center" name="size" type="radio" value="m">--}}
{{--                                        M--}}
{{--                                    </label>--}}
{{--                                    <label>--}}
{{--                                        <input class="w-9 h-9 flex items-center justify-center" name="size" type="radio" value="l">--}}
{{--                                        L--}}
{{--                                    </label>--}}
{{--                                    <label>--}}
{{--                                        <input class="w-9 h-9 flex items-center justify-center" name="size" type="radio" value="xl">--}}
{{--                                        XL--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="ml-auto text-sm text-gray-500 underline">Size Guide</div>--}}
{{--                            </div>--}}
{{--                            <div class="flex space-x-3 mb-4 text-sm font-medium">--}}
{{--                                <div class="flex-auto flex space-x-3">--}}
{{--                                    <button class="w-1/2 flex items-center justify-center rounded-md bg-black text-white" type="submit">Buy now</button>--}}
{{--                                    <button class="w-1/2 flex items-center justify-center rounded-md border border-gray-300" type="button">Add to bag</button>--}}
{{--                                </div>--}}
{{--                                <button class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300" type="button" aria-label="like">--}}
{{--                                    <svg width="20" height="20" fill="currentColor">--}}
{{--                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <p class="text-sm text-gray-500">--}}
{{--                                Free shipping on all continental US orders.--}}
{{--                            </p>--}}
{{--                        </form>--}}
{{--                    </div>--}}
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
