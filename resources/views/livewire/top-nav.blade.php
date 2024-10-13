<header
        x-data="{ open: false }"
        class="bg-primary">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8"
         aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ $navLinks[0]['href'] }}"
               class="-m-1.5 p-1.5">
                <span class="sr-only">{{ $companyName }}</span>
                <img class="h-8 w-auto"
                     src="{{ $companyLogo }}"
                     alt="">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button x-on:click="open = !open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    type="button"
                    class="-m-2.5 inline-flex items-center justify-center
                    rounded-md p-2.5 text-base-100">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            @foreach($navLinks as $navLink)
                <a href="{{ $navLink['href'] }}"
                   class="text-sm font-semibold leading-6 text-white">{{
                   $navLink['name'] }}</a>
            @endforeach
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="{{ $loginLink }}"
               class="text-sm font-semibold leading-6 text-neutral">
                Ingresar
                <span aria-hidden="true">&rarr;</span></a>
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="open"
         class="lg:hidden"
         role="dialog"
         aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-neutral/10">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}"
                   class="-m-1.5 p-1.5">
                    <span class="sr-only">{{ $companyName }}</span>
                    <img class="h-8 w-auto"
                         src="{{ $companyLogo }}"
                         alt="{{ $companyName }}"/>
                </a>
                <button x-on:click="open = !open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        type="button"
                        class="-m-2.5 rounded-md p-2.5 text-neutral">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-neutral/10">
                    <div class="space-y-2 py-6">
                        @foreach($navLinks as $navLink)
                            <a href="{{ $navLink['href'] }}"
                               class="-mx-3 block rounded-lg px-3 py-2
                               text-base font-semibold leading-7
                               text-neutral hover:bg-gray-50">{{
                               $navLink['name'] }}</a>
                        @endforeach
                    </div>
                    <div class="py-6">
                        <a href="{{ $loginLink }}"
                           class="-mx-3 block rounded-lg px-3 py-2.5
                           text-base font-semibold leading-7 text-neutral
                           hover:bg-gray-50">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

