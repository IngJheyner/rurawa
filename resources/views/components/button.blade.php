<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block px-4 py-2 bg-primary-color border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-primary-color-500 focus:bg-primary-color-500 active:bg-primary-color-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
