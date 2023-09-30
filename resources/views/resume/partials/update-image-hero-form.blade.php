<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update images') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Upload your image HERO.') }}
        </p>
    </header>


        <form action="{{ route('image.update', ['resume_id' => $resume->id]) }}"  method="POST" enctype="multipart/form-data">
            @csrf
  

                <!-- <input id="dropzone-file" type="file" accept="image/*" class="hidden" /> -->
                <input 
                    type="file" 
                    name="image_hero" 
                    id="dropzone-file"
                     
                    class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
 
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Upload your 3 Images.') }}
                </p>
                <input 
                type="file" 
                name="images[]" 
                id="dropzone-file"
                multiple 
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
 
                   
                <div class="flex items-center gap-4 pt-8">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
        
                    @if (session('status') === 'resume-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
       
        </form>
        
</section>
