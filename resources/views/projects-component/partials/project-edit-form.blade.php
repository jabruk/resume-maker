<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Resume Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's resume information.") }}
        </p>
        
    </header>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('resume.update',$resume->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="it_position" :value="__('Your IT Position')" />
            <x-text-input id="it_position" name="it_position" type="text" class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadow placeholder:opacity-30 dark:bg-slate-800 dark:text-gray-300 border border-[f0f0f0]" :value="old('it_position', $resume->it_position)" required autofocus autocomplete="it_position" />
            <x-input-error class="mt-2" :messages="$errors->get('it_position')" />
        </div>

        <div>
            <x-input-label for="introduction_text" :value="__('Introduction text')" />
            <x-forms.textarea id="introduction_text" type="text"  placeholder="Your introduction text" name="introduction_text" rows="6"  required autocomplete="introduction_text">
                {{$resume->introduction_text}}
            </x-forms.textarea>
            
            <x-input-error class="mt-2" :messages="$errors->get('introduction_text')" />

            
        </div>

        <div>
            <x-input-label for="inspire_phrase" :value="__('Some inspirational phrase')" />
            <x-text-input id="inspire_phrase" name="inspire_phrase" type="text" class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadow placeholder:opacity-30 dark:bg-slate-800 dark:text-gray-300 border border-[f0f0f0]" :value="old('inspire_phrase', $resume->inspire_phrase)" required autofocus autocomplete="inspire_phrase" />
            <x-input-error class="mt-2" :messages="$errors->get('inspire_phrase')" />
        </div>

        <div>
            <x-input-label for="about_me" :value="__('About me text')" />
            <x-forms.textarea id="about_me" type="text"  placeholder="Your text" name="about_me" rows="6"  required autocomplete="about_me">
                {{$resume->about_me}}
            </x-forms.textarea>
            
            <x-input-error class="mt-2" :messages="$errors->get('about_me')" />

            
        </div>

        <div class="flex items-center gap-4">
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
