<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="relative" action="{{ route('tokens.create') }}" method="POST">
                        @csrf
{{--                        <svg width="20" height="20" fill="currentColor" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />--}}
{{--                        </svg>--}}
                        <input class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10X" type="text" name="token_name" aria-label="Access Token" placeholder="Access Token" />
                        <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">Create</button>
                    </form>

                    <table class="mx-auto mt-4 table-auto w-full rounded">
                        <thead class="justify-between">
                        <tr class="bg-green-600">
                            <th class="px-16 py-2">
                                <span class="text-gray-100 font-semibold">#</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-gray-100 font-semibold">{{ __('Tokenable Type') }}</span>
                            </th>
                            {{--                                <th class="px-16 py-2">--}}
                            {{--                                    <span class="text-gray-100 font-semibold">{{ __('Image') }}</span>--}}
                            {{--                                </th>--}}
                            <th class="px-16 py-2">
                                <span class="text-gray-100 font-semibold">{{ __('Tokenable Id') }}</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-gray-100 font-semibold">{{ __('Name') }}</span>
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
{{--                        @foreach($user->tokens as $index => $token)--}}
                        @foreach($tokens as $index => $token)
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
                                    <span class="text-center ml-2 font-semibold">{{ $token->tokenable_type }}</span>
                                </td>
                                <td class="overflow-x-scroll_max-w-md">
                                    <span class="text-center ml-2 font-semibold">{{ $token->tokenable_id }}|***</span>
                                </td>
                                <td>
                                    <span class="text-center ml-2 font-semibold">{{ $token->name }}</span>
                                </td>

{{--                                <td class="px-16 py-2">--}}
{{--                                    <span>{{ \Illuminate\Support\Str::words($product->description, 100) }}</span>--}}
{{--                                </td>--}}

                                <td class="px-16 py-2">
                                    <span>{{ date('d/M/Y', strtotime($token->created_at)) }}</span>
                                </td>

{{--                                <td class="px-16 py-2">--}}
{{--                                  <span class="text-yellow-500 flex">--}}
{{--                                      <button @click="removeProduct({{ $product }})" href="{{ route('product.edit', $product->id) }}">--}}
{{--                                      <a href="{{ route('product.edit', $product->id) }}">--}}
{{--                                          <svg--}}
{{--                                              xmlns="http://www.w3.org/2000/svg"--}}
{{--                                              class="h-5 w-5 text-green-700 mx-2"--}}
{{--                                              viewBox="0 0 20 20"--}}
{{--                                              fill="currentColor"--}}
{{--                                          >--}}
{{--                                            <path--}}
{{--                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"--}}
{{--                                            />--}}
{{--                                            <path--}}
{{--                                                fill-rule="evenodd"--}}
{{--                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"--}}
{{--                                                clip-rule="evenodd"--}}
{{--                                            />--}}
{{--                                          </svg>--}}
{{--                                      </a>--}}
{{--                                         <button class="remove-product" @click="(removeProduct({{ $product }}))" href="{{ route('product.destroy', $product) }}">--}}
{{--                                         <button x-on:click="removeProduct({{ $product }})">--}}
{{--                                             <svg--}}
{{--                                                 xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                 class="h-5 w-5 text-red-700"--}}
{{--                                                 viewBox="0 0 20 20"--}}
{{--                                                 fill="currentColor"--}}
{{--                                             >--}}
{{--                                                <path--}}
{{--                                                    fill-rule="evenodd"--}}
{{--                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"--}}
{{--                                                    clip-rule="evenodd"--}}
{{--                                                />--}}
{{--                                            </svg>--}}
{{--                                         </button>--}}
{{--                                    </span>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
