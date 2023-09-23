<!-- ====== About Section Start -->
<section id="about" class="dark:bg-slate-800 pt-20 lg:pt-[120px] pb-12 lg:pb-[90px] overflow-hidden">
    <div class="container">
      <div class="flex flex-wrap justify-between items-center -mx-4">
        <div class="w-full lg:w-6/12 px-4">
          <div class="flex items-center -mx-3 sm:-mx-4">
            <div class="w-full xl:w-1/2 px-3 sm:px-4">
              <div class="py-3 sm:py-4">
                <img
                  src="{{ url('/img/me1.png') }}"
                  alt=""
                  class="rounded-2xl w-full"
                />
              </div>
              <div class="py-3 sm:py-4">
                <img
                  src="{{ url('/img/me3.png') }}"
                  alt=""
                  class="rounded-2xl w-full"
                />
              </div>
            </div>
            <div class="w-full xl:w-1/2 px-3 sm:px-4">
              <div class="my-4 relative z-10">
                <img
                  src="{{ url('/img/me2.png') }}"
                  alt=""
                  class="rounded-2xl w-full"
                />
                <x-about-dots></x-about-dots>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
          <div class="mt-10 lg:mt-0">
            <span class="font-semibold text-lg text-primary mb-2 block">
               <blockquote class="text-sm text-gray-500 italic py-2 px-3 border-l-4 border-amber-500">
                   "Everything is achievable with hard work"
               </blockquote>
            </span>
            <h2 class="font-bold text-3xl sm:text-4xl dark:text-gray-200 mb-8">
              About Me
            </h2>
            <p class="text-base dark:text-gray-400 mb-8">
              I have been working as a php developer only one year. <br />
              During this year, I managed to study a lot of technologies, work on one interesting project,
              but very often I feel that I am not even a junior developer. It's like: "The more you know the less you know" <br />
            </p>
            <p class="text-base dark:text-gray-400 mb-8">
              In 2020 i have started to learn programming with <span class="text-amber-500 font-bold">JAVA</span>. I got the main programming base with this language.  
              But now, due to unexpected circumstances, I'm working with <span class="text-amber-500 font-bold">PHP</span> and I don't regret at all. <br />
            </p>
            <x-button-link href="https://www.linkedin.com/in/jabruk/" variant="blue" target="_blank" class="mr-3 w-full mb-3 text-center lg:w-auto">
              View my LinkedIn
            </x-button-link>
            <x-button-link href="https://plum-ruthe-76.tiiny.site/" variant="red" target="_blank" class="mr-3 w-full mb-3 text-center lg:w-auto">
                View my old Resume
              </x-button-link>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== About Section End -->