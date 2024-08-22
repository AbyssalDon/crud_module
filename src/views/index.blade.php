<x-app-layout>
	<a href="{{ route('products.create') }}" 
       style="
		display: block;
        width: 80%;
        max-width: 300px;
        margin: 20px auto;
        padding: 10px;
        background-color: #3498db;
        color: white;
        text-align: center;
        border-radius: 5px;">{{ __('Create Product') }}</a>
    <div class="mt-6 grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($products as $product)
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <span class="text-gray-800">{{ $product->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $product->created_at->format('j M Y, g:i a') }}</small>
                        </div>
                        @if ($product->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('products.edit', $product)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
									<form method="POST" action="{{ route('products.destroy', $product) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('products.destroy', $product)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                    </div>
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="mt-2 text-gray-700">{{ $product->description }}</p>
                    <div class="mt-4 text-lg font-bold text-gray-900">${{ $product->price }}</div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>