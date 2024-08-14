@php
    //
@endphp

<form action="{{ route('language-switch') }}" method="POST" class="inline-block">
    @csrf
    <select name="locale"
            onchange="this.form.submit()" {{ $attributes->merge(['class' => 'mr-2 text-sm border-0 bg-transparent bg-clip-padding outline-none transition duration-200 ease-in-out focus:shadow-inset motion-reduce:transition-none dark:autofill:shadow-autofill focus:outline-none hover:bg-transparent hover:backdrop-transparent hover:border-gray-300 hover:rounded-xl focus:rounded-xl focus:ring-gray-100 hover:focus:ring-gray-100 dark:focus:ring-gray-800 dark:hover:focus:ring-gray-800 focus:border-gray-300 focus:bg-transparent dark:text-slate-50 dark:bg-transparent dark:hover:bg-transparent']) }}>
{{--        <select name="locale"--}}
{{--                onchange="this.form.submit()" {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500']) }}>--}}
        @foreach($languages as $locale)
                <option class="dark:bg-gray-500 dark:text-slate-50 dark:hover:bg-gray-600 dark:hover:text-slate-50"
                        value="{{ $locale->code }}" {{ app()->getLocale() === $locale->code ? 'selected' : '' }}>{{ $locale->name }}</option>
        @endforeach
    </select>
</form>

<div class="relative">
{{--    <button class="flex items-center h-8 pl-3 pr-2 border border-black focus:outline-none">--}}
{{--            <span class="text-sm leading-none">--}}
{{--                Dropdown--}}
{{--            </span>--}}
{{--        <svg class="w-4 h-4 mt-px ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">--}}
{{--            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--        </svg>--}}
{{--    </button>--}}
{{--    <div class="absolute flex flex-col w-40 mt-1 border border-black shadow-lg">--}}
{{--        <a class="flex items-center h-8 px-3 text-sm hover:bg-gray-200" href="#">Item 1</a>--}}
{{--        <a class="flex items-center h-8 px-3 text-sm hover:bg-gray-200" href="#">Item 2</a>--}}
{{--        <a class="flex items-center h-8 px-3 text-sm hover:bg-gray-200" href="#">Item 3</a>--}}
{{--        <a class="flex items-center h-8 px-3 text-sm hover:bg-gray-200" href="#">Item 4</a>--}}
{{--    </div>--}}
</div>
