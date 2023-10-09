<x-call-to-action>
    <x-slot:title>
        <h1 class=" text-white font-bold text-3xl sm:text-[38px] leading-tight mb-6 sm:mb-8 lg:mb-0 ">
            The Instruments <br class="hidden xs:block" />
            I Have Used, During all my Way:
        </h1>
        </x-slot>

        <div class="hidden">
            {{{  $logos = \App\Models\Image::where(['resume_id' => Auth::user()->resume->id, 'image_name' => 'logo'])->get() }}}
        </div>
        @for($logos = $logos->toArray(), $i = 0; $i < sizeof( $logos) ;$i++)
            <div class="w-full lg:w-10/12 px-4">
                <div class="flex items-center -mx-3 sm:-mx-4">
                    <div class="w-full xl:w-1/2 px-3 sm:px-4">
                        <div class="py-3 sm:py-4">
                            @if($logos[$i]['logo'] == 'logo'.$i)
                                <img src="{{ url('/img/'.$logos[$i]['image']) }}"
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @else
                                <img src="{{ url('/img/image.png') }}" alt=""
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @endif
                        </div>
                        @if($i < sizeof($logos) - 1)
                        <div class="hidden">{{$i++;}}</div>
                        @else
                        @break
                        @endif
                        <div class="py-3 sm:py-4">
                            @if($logos[$i]['logo'] == 'logo'.$i)
                                <img src="{{ url('/img/'.$logos[$i]['image']) }}"
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @else
                                <img src="{{ url('/img/image.png') }}" alt=""
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @endif
                        </div>
                        @if($i < sizeof($logos) - 1)
                        <div class="hidden">{{$i++;}}</div>
                        @else
                        @break
                        @endif

                    </div>
                    <div class="w-full xl:w-1/2 px-3 sm:px-4">
                        <div class="my-4 relative z-10">
                            @if($logos[$i]['logo'] == 'logo'.$i)
                                <img src="{{ url('/img/'.$logos[$i]['image']) }}"
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @else
                                <img src="{{ url('/img/image.png') }}" alt=""
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @endif
                        </div>

                        @if($i < sizeof($logos) - 1)
                        <div class="hidden">{{$i++;}}</div>
                        @else
                        @break
                        @endif

                        <div class="my-1 relative z-10">
                            @if($logos[$i]['logo'] == 'logo'.$i)
                                <img src="{{ url('/img/'.$logos[$i]['image']) }}"
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @else
                                <img src="{{ url('/img/image.png') }}" alt=""
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @endif
                        </div>
                                                @if($i < sizeof($logos) - 1)
                        <div class="hidden">{{$i++;}}</div>
                        @else
                        @break
                        @endif

                        <div class="py-3 sm:py-4">
                            @if($logos[$i]['logo'] == 'logo'.$i)
                                <img src="{{ url('/img/'.$logos[$i]['image']) }}"
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @else
                                <img src="{{ url('/img/image.png') }}" alt=""
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @endif
                        </div>
                                                @if($i < sizeof($logos) - 1)
                        <div class="hidden">{{$i++;}}</div>
                        @else
                        @break
                        @endif

                        <div class="my-4 relative z-10">
                            @if($logos[$i]['logo'] == 'logo'.$i)
                                <img src="{{ url('/img/'.$logos[$i]['image']) }}"
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @else
                                <img src="{{ url('/img/image.png') }}" alt=""
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @endif
                        </div>
                                                @if($i < sizeof($logos) - 1)
                        <div class="hidden">{{$i++;}}</div>
                        @else
                        @break
                        @endif

                    </div>
                    <div class="w-full xl:w-1/2 px-3 sm:px-4">
                        <div class="py-3 sm:py-4">
                            @if($logos[$i]['logo'] == 'logo'.$i)
                                <img src="{{ url('/img/'.$logos[$i]['image']) }}"
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @else
                                <img src="{{ url('/img/image.png') }}" alt=""
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @endif
                        </div>
                                                @if($i < sizeof($logos) - 1)
                        <div class="hidden">{{$i++;}}</div>
                        @else
                        @break
                        @endif

                        <div class="py-3 sm:py-4">
                            @if($logos[$i]['logo'] == 'logo'.$i)
                                <img src="{{ url('/img/'.$logos[$i]['image']) }}"
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @else
                                <img src="{{ url('/img/image.png') }}" alt=""
                                    class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out" />
                            @endif

                        </div>
                        <div class="hidden">{{$i = 1000000;}}</div>

                    </div>
                </div>
            </div>

        @endfor

        
        @if(empty($logos)) 
      <div class="w-full lg:w-10/12 px-4">
        <div class="flex items-center -mx-3 sm:-mx-4">
          <div class="w-full xl:w-1/2 px-3 sm:px-4">
            <div class="py-3 sm:py-4">
              <img
                src="{{ url('/img/image.png') }}" 
                alt=""
                class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out"
              />
            </div>
            <div class="py-3 sm:py-4">
              <img
                src="{{ url('/img/image.png') }}" 
                alt=""
                class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out"
              />
            </div>
          </div>
          <div class="w-full xl:w-1/2 px-3 sm:px-4">
            <div class="my-4 relative z-10">
              <img
                src="{{ url('/img/image.png') }}" 
                alt=""
                class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out"
              />
            </div>
            <div class="my-1 relative z-10">
              <img
                src="{{ url('/img/image.png') }}" 
                alt=""
                class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out"
              />
            </div>
            <div class="py-3 sm:py-4">
              <img
                src="{{ url('/img/image.png') }}" 
                alt=""
                class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out"
              />
            </div>
            <div class="my-4 relative z-10">
              <img
                src="{{ url('/img/image.png') }}" 
                alt=""
                class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out"
              />
            </div>
          </div>
          <div class="w-full xl:w-1/2 px-3 sm:px-4">
            <div class="py-3 sm:py-4">
              <img
                src="{{ url('/img/image.png') }}" 
                alt=""
                class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out"
              />
            </div>
            <div class="py-3 sm:py-4">
              <img
                src="{{ url('/img/image.png') }}" 
                alt=""
                class="rounded-2xl w-full animate-wiggle animate-infinite animate-ease-in-out"
              />
            </div>
          </div>
        </div>
      </div>
      @endif

</x-call-to-action>
