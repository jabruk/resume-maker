<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Resume Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's resume information.") }}
        </p>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                //when the Add Field button is clicked
                $("#add").click(function(e) {
                    //Append a new row of code to the "#items" div

                    var numItems = $('.category-input').length;
                    if (numItems <= 2) {
                        $("#items").append(
                            ` <div class="category-input"><input type="text" id="category${numItems}" name="category${numItems}" placeholder="Active Input" class="border-primary text-body-color placeholder-body-color focus:border-primary active:border-primary w-3/4 mb-2 rounded-lg border-[1.5px] py-3 px-5 font-medium outline-none transition disabled:cursor-default disabled:bg-[#F5F7FD]" /> <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 delete">Delete</button></div>  `
                        );
                    } else {

                    }
                });

                $("body").on("click", ".delete", function(e) {
                    $(this).parent("div").remove();



                });

            });
        </script>

    </header>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('project.store', [ 'resume_id' => $resume]) }}" class="mt-6 space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('post')
        {{-- {{dd($project->category)}} --}}
        <div>
            <x-input-label for="project_name" :value="__('Name of your project')" />
            <x-text-input id="project_name" name="project_name" type="text"
                class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadow placeholder:opacity-30 dark:bg-slate-800 dark:text-gray-300 border border-[f0f0f0]"
                required autofocus autocomplete="project_name" />
            <x-input-error class="mt-2" :messages="$errors->get('project_name')" />
        </div>

        <div>
            <x-input-label for="project_link" :value="__('Github link')" />
            <x-text-input id="project_link" name="project_link" type="text"
                class="inline-block w-full rounded-full bg-white p-2.5 leading-none text-black placeholder-indigo-900 shadow placeholder:opacity-30 dark:bg-slate-800 dark:text-gray-300 border border-[f0f0f0]"
                required autofocus autocomplete="project_link" />
            <x-input-error class="mt-2" :messages="$errors->get('project_link')" />
        </div>

        <input type="file" name="image_project" id="dropzone-file" 
            class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" >

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">

                <div class="row">
                    <div class="panel panel-primary" style="border: 0;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-10">
                                </div>
                            </div>
                        </div>


                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-1"> </div>
                                <div class="col-sm-10">
                                </div>
                                <div class="col-sm-1"> </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-1">


                                        <div id="items">



                                        </div>

                                    </div>
                                </div>
                            </div>

                            <button type="button" id="add"
                                class="button relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                <span
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Add category
                                </span>
                            </button>
                            {{-- <button type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add category</button> --}}



                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            {{-- 
            @if (session('status') === 'resume-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif --}}
        </div>
    </form>

   
</section>
