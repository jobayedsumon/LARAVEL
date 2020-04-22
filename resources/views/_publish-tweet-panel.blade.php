<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf
        <textarea name="body" class="w-full"
                  placeholder="What's up doc?" required autofocus></textarea>
        <hr class="my-4">
        <footer class="flex justify-between items-center">

            <div class="flex-shrink-0">
                <img height="50px" width="50px" src="{{ auth()->user()->avatar }}" alt=""
                     class="rounded-full mr-2">
            </div>
            <x-button>Publish</x-button>
        </footer>
    </form>
    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
