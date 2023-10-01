<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update project') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Upload your projects.') }}
        </p>
    </header>


        <form action="{{ route('resume.edit', ['resume' => $resume]) }}"  method="POST" enctype="multipart/form-data">
            @csrf
  

                
                <div class="flex flex-wrap -mx-4">
                  @foreach ($items as $item)
                    <x-portfolio-item-edit 
                                      :id="1"
                                      :title="$item['title']"
                                      :categories="$item['category']"
                                      :image="$item['image']"
                                      :github="$item['github']"></x-portfolio-item-edit>
                  @endforeach
                </div>








                <div class="flex items-center gap-4 pt-8">
                    <x-primary-button-link href="{{ route('project.create', ['resume' => $resume]) }}">{{ __('Create') }}</x-primary-button-link>
                </div>
        </form>
        
</section>
