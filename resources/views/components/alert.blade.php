<!-- This example requires Tailwind CSS v2.0+ -->
{{--<div {{ $attributes->merge(['type' => 'submit', 'class' => 'fixed z-10 inset-0 overflow-y-auto']) }} aria-labelledby="modal-title" role="dialog" aria-modal="true">--}}
<div class="-m-2 text-center">
    <div x-bind:class="! error ? 'hidden' : 'block'" class="p-2">
        {{--                        <div x-show="err" class="p-2">--}}
        <div class="inline-flex items-center w-full bg-pink-300 leading-none text-pink-600 rounded-full p-2 shadow text-teal text-sm">
            <span class="inline-flex bg-pink-600 text-white rounded-full h-6 px-3 justify-center items-center">{{ __('Error') }}</span>
            <span class="inline-flex px-2">Whoops! Something error.</span>
        </div>
    </div>

    <div x-bind:class="! success ? 'hidden' : 'block'" class="p-2">
        <div class="inline-flex items-center w-full bg-green-300 leading-none text-purple-600 rounded-full p-2 shadow text-sm">
            <span class="inline-flex bg-green-600 text-white rounded-full h-6 px-3 justify-center items-center text-">{{ __('Success') }}</span>
            <span class="inline-flex px-2">Operation Successful.</span>
        </div>
    </div>

</div>
