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
                  @if (! is_null($projects))
                  @foreach ($projects as $project)
                        <x-portfolio-item-edit 
                                        :id="$project->id"
                                        :title="$project['name']"
                                        :categories="$project['category']"
                                        :image="$project->getRelation('image')->image"
                                        :github="$project['github']"></x-portfolio-item-edit>
                    @endforeach
                  @endif      
                </div>








                <div class="flex items-center gap-4 pt-8">
                    <x-primary-button-link href="{{ route('project.create', ['resume' => $resume]) }}">{{ __('Create') }}</x-primary-button-link>
                </div>
        </form>
        
</section>
