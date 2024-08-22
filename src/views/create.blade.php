<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input id="name" name="name" type="text" placeholder="What is the name of your product?"
                       class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" 
				          name="description" 
						  placeholder="Describe the product..." 
						  rows="3"
						  class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input id="price" name="price" type="number" placeholder="What is the price of your product?"
                       class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            </div>
			<x-input-error :messages="$errors->get('name')" class="mt-2" />
			<x-input-error :messages="$errors->get('description')" class="mt-2" />
			<x-input-error :messages="$errors->get('price')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
        </form>
	</div>
</x-app-layout>