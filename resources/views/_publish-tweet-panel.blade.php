<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf
        <textarea maxlength="255" id="tweetBody" name="body" class="w-full"
                  placeholder="What's up doc?" required autofocus></textarea>
        <hr class="my-4">
        <footer class="flex justify-between items-center">

            <div class="flex-shrink-0">
                <img height="50px" width="50px" src="{{ auth()->user()->avatar }}" alt=""
                     class="rounded-full mr-2">
            </div>
            <input type="file" name="image">
            <x-button>Publish</x-button>
        </footer>
    </form>
    <p id="charRemains" class="text-blue-600 text-sm mt-4">Remaining characters 255</p>
    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
