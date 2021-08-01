<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div x-data="init()" class="p-6 bg-white border-b border-gray-200">

                    <x-alert />

                    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
                        <header class="flex items-center justify-between">
                            <h2 class="text-lg leading-6 font-medium text-black">Projects</h2>
                            <a href="{{ route('product.create') }}" class="hover:bg-light-blue-200 hover:text-light-blue-800 group flex items-center rounded-md bg-light-blue-100 text-light-blue-600 text-sm font-medium px-4 py-2">
                                <svg class="group-hover:text-light-blue-600 text-light-blue-500 mr-2" width="12" height="20" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
                                </svg>
                                New
                            </a>
                        </header>
                        <form class="relative">
                            <svg width="20" height="20" fill="currentColor" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                            </svg>
                            <input class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" type="text" aria-label="Filter projects" placeholder="Filter projects" />
                        </form>

{{--                        <table class="table-fixedX border-separate border border-green-800">--}}
{{--                        <table class="max-w-5xl mx-auto table-auto">--}}
                        <table class="mx-auto table-auto w-full">
                            <thead class="justify-between">
                            <tr class="bg-green-600">
                                <th class="px-16 py-2">
                                    <span class="text-gray-100 font-semibold">#</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-100 font-semibold">{{ __('Title') }}</span>
                                </th>
{{--                                <th class="px-16 py-2">--}}
{{--                                    <span class="text-gray-100 font-semibold">{{ __('Image') }}</span>--}}
{{--                                </th>--}}
                                <th class="px-16 py-2">
                                    <span class="text-gray-100 font-semibold">{{ __('Price') }}</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-100 font-semibold">{{ __('Description') }}</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-100 font-semibold">{{ __('Created At') }}</span>
                                </th>
                                <th class="px-16 py-2">
                                    <span class="text-gray-100 font-semibold">{{ __('Action') }}</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-gray-200">
                            @foreach($products as $index => $product)
                            <tr class="bg-white border-b-2 border-gray-200">
                                <td class="px-16 py-2 flex flex-row items-center">
{{--                                    <img--}}
{{--                                        class="h-8 w-8 rounded-full object-cover "--}}
{{--                                        src="https://randomuser.me/api/portraits/men/30.jpg"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    <span class="text-center ml-2 font-semibold">{{ $product->title }}</span>
                                </td>
{{--                                <td>--}}
{{--                                    <span class="text-center ml-2 font-semibold">{{ $product->image ?? $product->image->image }}</span>--}}
{{--                                </td>--}}
                                <td>
                                    <span class="text-center ml-2 font-semibold">{{ $product->price }}</span>
                                </td>

                                <td class="px-16 py-2">
                                    <span>{{ \Illuminate\Support\Str::words($product->description, 100) }}</span>
                                </td>

                                <td class="px-16 py-2">
                                    <span>{{ date('d/M/Y', strtotime($product->created_at)) }}</span>
                                </td>

                                <td class="px-16 py-2">
                                  <span class="text-yellow-500 flex">
{{--                                      <button @click="removeProduct({{ $product }})" href="{{ route('product.edit', $product->id) }}">--}}
                                      <a href="{{ route('product.edit', $product->id) }}">
                                          <svg
                                              xmlns="http://www.w3.org/2000/svg"
                                              class="h-5 w-5 text-green-700 mx-2"
                                              viewBox="0 0 20 20"
                                              fill="currentColor"
                                          >
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd"
                                            />
                                          </svg>
                                      </a>
{{--                                         <button class="remove-product" @click="(removeProduct({{ $product }}))" href="{{ route('product.destroy', $product) }}">--}}
                                         <button x-on:click="removeProduct({{ $product }})">
                                             <svg
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 class="h-5 w-5 text-red-700"
                                                 viewBox="0 0 20 20"
                                                 fill="currentColor"
                                             >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                         </button>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

{{--                        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">--}}
{{--                            <li x-for="item in items">--}}
{{--                                <a :href="item.url" class="hover:bg-light-blue-500 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 border border-gray-200">--}}
{{--                                    <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">--}}
{{--                                        <div>--}}
{{--                                            <dt class="sr-only">Title</dt>--}}
{{--                                            <dd class="group-hover:text-white leading-6 font-medium text-black">--}}
{{--                                                {item.title}--}}
{{--                                            </dd>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <dt class="sr-only">Category</dt>--}}
{{--                                            <dd class="group-hover:text-light-blue-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">--}}
{{--                                                {item.category}--}}
{{--                                            </dd>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-start-2 row-start-1 row-end-3">--}}
{{--                                            <dt class="sr-only">Users</dt>--}}
{{--                                            <dd class="flex justify-end sm:justify-start lg:justify-end xl:justify-start -space-x-2">--}}
{{--                                                <img x-for="user in item.users" :src="user.avatar" :alt="user.name" width="48" height="48" class="w-7 h-7 rounded-full bg-gray-100 border-2 border-white" />--}}
{{--                                            </dd>--}}
{{--                                        </div>--}}
{{--                                    </dl>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="hover:shadow-lg flex rounded-lg">--}}
{{--                                <a href="/new" class="hover:border-transparent hover:shadow-xs w-full flex items-center justify-center rounded-lg border-2 border-dashed border-gray-200 text-sm font-medium py-4">--}}
{{--                                    New Project--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

                        {{ $products->links() }}

{{--                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">--}}
{{--                            <div>--}}
{{--                                <p class="text-sm text-gray-700">--}}
{{--                                    Showing--}}
{{--                                    <span class="font-medium">1</span>--}}
{{--                                    to--}}
{{--                                    <span class="font-medium">10</span>--}}
{{--                                    of--}}
{{--                                    <span class="font-medium">97</span>--}}
{{--                                    results--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">--}}
{{--                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">--}}
{{--                                        <span class="sr-only">Previous</span>--}}
{{--                                        <!-- Heroicon name: solid/chevron-left -->--}}
{{--                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->--}}
{{--                                    <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">--}}
{{--                                        1--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">--}}
{{--                                        2--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">--}}
{{--                                        3--}}
{{--                                    </a>--}}
{{--                                    <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">--}}
{{--          ...--}}
{{--        </span>--}}
{{--                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">--}}
{{--                                        8--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">--}}
{{--                                        9--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">--}}
{{--                                        10--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">--}}
{{--                                        <span class="sr-only">Next</span>--}}
{{--                                        <!-- Heroicon name: solid/chevron-right -->--}}
{{--                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                </nav>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </section>

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
                    <x-modal x-bind:class="! show ? 'hidden' : 'block'" class="hiddenx" />
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function init() {
                return {
                    product: [],
                    {{--products: {{ $products }},--}}
                    show: false,
                    confirm: false,
                    success: false,
                    error: false,
                    e: '{{ route('product.edit', ':prod') }}',
                    d: '{{ route('product.destroy', ':prod') }}',
                    yesOption: async function () {
                        this.confirm = true
                        if (this.confirm) {
                            let url = this.d.replace(':prod', this.product.id)
                            // let url = this.d.replace(':prod', 2222)
                            await axios.delete(url)
                                .then(function (response) {
                                    if (response.status == 200) {
                                        this.success = true
                                        location.reload()
                                    }
                                })
                                .catch(function (error) {
                                    this.show = false
                                    this.error = true
                                })
                                .then(function () {
                                    // always executed
                                });
                        }
                    },
                    noOption: function () {
                        this.show = false
                    },
                    editProduct: function (product) {
                        this.product = product;
                        let url = this.e.replace(':prod', this.product)
                        console.dir(this.e)
                        console.dir(url)
                    },
                    removeProduct: function (product) {
                        this.show = true
                        this.product = product
                    }
                };
            }
        </script>
        {{--<script>--}}
        {{--    let rmas = document.getElementsByClassName('remove-product');--}}
        {{--    for (const [index, ele] of Object.entries(rmas)) {--}}
        {{--        ele.addEventListener("click", async function (event) {--}}
        {{--            event.preventDefault();--}}
        {{--            let href = this.href--}}
        {{--            await removeProduct(href)--}}
        {{--        });--}}
        {{--    }--}}

        {{--    function removeProduct(product) {--}}
        {{--        axios.delete(product).then(function (response) {--}}
        {{--            console.log(response);--}}
        {{--        })--}}
        {{--            .catch(function (error) {--}}
        {{--                console.log(error);--}}
        {{--            })--}}
        {{--            .then(function () {--}}
        {{--                // always executed--}}
        {{--            });--}}
        {{--    }--}}
        {{--</script>--}}
    @endpush

</x-app-layout>
