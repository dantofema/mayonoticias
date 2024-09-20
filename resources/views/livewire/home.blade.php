<div>
    <div class="grid grid-cols-2">
        <div class="">
            <livewire:card-header-home :post="$posts[0]"
                                       :key="$posts[0]['id']"/>
        </div>
        <div class="">
            <livewire:card-header-home :post="$posts[1]"
                                       :key="$posts[1]['id']"/>
        </div>

    </div>

    <div class="bg-blue-800">
        <div class="px-6 py-24 sm:px-6 sm:py-10 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-100
                sm:text-4xl">
                    Formá parte del debate</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8
                text-gray-200">
                    Leé las opiniones más destacadas sobre la actualidad
                    argentina y analizá los temas que marcan el rumbo del
                    país.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="#"
                       class="rounded-md bg-indigo-900 px-3.5 py-2.5 text-sm
                       font-semibold text-white shadow-sm hover:bg-indigo-500
                        focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2
                        focus-visible:outline-indigo-600">Ir a la
                        sección política</a>
                    <a href="#"
                       class="text-sm font-semibold leading-6
                       text-gray-100">Leer
                        Opiniones <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 mt-20">
        @foreach($posts as $post)
            <div class="">
                <livewire:card-home :post="$post"
                                    :key="$post['id']"/>
            </div>
        @endforeach
    </div>

    <div class="relative bg-blue-900">
        <div class="relative h-80 overflow-hidden bg-indigo-600 md:absolute md:left-0 md:h-full md:w-1/3 lg:w-1/2">
            <img class="h-full w-full object-cover"
                 src="{{ asset('img/periodismo-digital.jpg') }}"
                 alt="">
            <svg viewBox="0 0 926 676"
                 aria-hidden="true"
                 class="absolute -bottom-24 left-24 w-[57.875rem] transform-gpu blur-[118px]">
                <path fill="url(#60c3c621-93e0-4a09-a0e6-4c228a0116d8)"
                      fill-opacity=".4"
                      d="m254.325 516.708-90.89 158.331L0 436.427l254.325 80.281 163.691-285.15c1.048 131.759 36.144 345.144 168.149 144.613C751.171 125.508 707.17-93.823 826.603 41.15c95.546 107.978 104.766 294.048 97.432 373.585L685.481 297.694l16.974 360.474-448.13-141.46Z"/>
                <defs>
                    <linearGradient id="60c3c621-93e0-4a09-a0e6-4c228a0116d8"
                                    x1="926.392"
                                    x2="-109.635"
                                    y1=".176"
                                    y2="321.024"
                                    gradientUnits="userSpaceOnUse">
                        <stop stop-color="#776FFF"/>
                        <stop offset="1"
                              stop-color="#FF4694"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="relative mx-auto max-w-7xl py-24 sm:py-32 lg:px-8 lg:py-40">
            <div class="pl-6 pr-6 md:ml-auto md:w-2/3 md:pl-16 lg:w-1/2 lg:pl-24 lg:pr-0 xl:pl-32">
                <h2 class="text-base font-semibold leading-7 text-indigo-400">
                    ¿Te apasiona la política y tenés algo que decir?</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">
                    Estamos aquí para informar</p>
                <p class="mt-6 text-base leading-7 text-gray-300">Sumate a
                    nuestro equipo de reporteros y compartí tu visión sobre la
                    actualidad argentina.
                    Escribí con nosotros y hacé que tu voz llegue más lejos.</p>
                <div class="mt-8">
                    <a href="#"
                       class="inline-flex rounded-md bg-white/10 px-3.5 py-2
                       .5 text-sm font-semibold text-white shadow-sm
                       hover:bg-white/20 focus-visible:outline
                       focus-visible:outline-2 focus-visible:outline-offset-2
                        focus-visible:outline-white">Ponete en contacto y
                        sumate</a>
                </div>
            </div>
        </div>
    </div>


</div>
