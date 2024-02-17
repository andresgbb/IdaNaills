<div class="flex justify-center w-full">
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block w-20 px-4 py-2 bg-orange-600 text-white rounded-md font-semibold text-sm hover:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-gray-100']) }}>
    {{ $slot }}
</button>
</div>
