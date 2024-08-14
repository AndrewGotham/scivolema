<header
    class="fixed inset-x-0 z-20 mx-auto mb-4 px-4 transition-all animate-out duration-1000 sm:top-0 sm:h-16 sm:px-0 sm:transition-none bottom-0 animate-in">
    <div
        class="flex items-center gap-2 rounded-full border-b border-foreground/25 bg-background/95 px-3 py-2 shadow-md supports-[backdrop-filter]:bg-background/60 supports-[backdrop-filter]:bg-clip-padding supports-[backdrop-filter]:backdrop-blur sm:justify-between sm:rounded-none sm:px-3">
        <div class="container mx-auto flex max-w-6xl">
            <div class="flex items-center justify-start space-x-2">
                <div class="group aspect-square h-auto w-10 overflow-hidden rounded-full border border-black/10">
                    <a href="{{ env('APP_URL') }}">
                        <x-application-logo class="dark:bg-amber-50"/>
                    </a>
                </div>
                @guest
                    <div
                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 max-w-full border-accent-foreground bg-transparent text-primary backdrop-blur-md transition-colors duration-150 hover:bg-accent-foreground hover:text-white">
                        <div
                            class="mr-1 flex aspect-square h-[14px] w-[14px] animate-pulse rounded-full bg-green-500/50 dark:bg-green-400/50 sm:m-0 md:mr-1"
                            aria-hidden="true">
                            <div class="m-auto h-2 w-2 rounded-full bg-green-500 dark:bg-green-400"></div>
                        </div>
                        <a href="{{ route('login') }}">
                            <span class="inline whitespace-nowrap sm:hidden md:inline">{{ __('Sign In') }}</span>
                        </a>
                    </div>
                    <div
                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 max-w-full border-accent-foreground bg-transparent text-primary backdrop-blur-md transition-colors duration-150 hover:bg-accent-foreground hover:text-white">
                        <div
                            class="mr-1 flex aspect-square h-[14px] w-[14px] animate-pulse rounded-full bg-green-500/50 dark:bg-green-400/50 sm:m-0 md:mr-1"
                            aria-hidden="true">
                            <div class="m-auto h-2 w-2 rounded-full bg-green-500 dark:bg-green-400"></div>
                        </div>
                        <a href="{{ route('register') }}">
                            <span class="inline whitespace-nowrap sm:hidden md:inline">{{ __('Sign Up') }}</span>
                        </a>
                    </div>
                @endguest
                @auth
                    {{-- Admin Dashboard | Check if Admin!!! --}}
                    <div
                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 max-w-full border-accent-foreground bg-transparent text-primary backdrop-blur-md transition-colors duration-150 hover:bg-accent-foreground hover:text-white">
                        <a href="{{ route('admin') }}">
                            <span class="inline whitespace-nowrap sm:hidden md:inline">{{ __('Admin Dashboard') }}</span>
                        </a>
                    </div>

                    {{-- Lougout --}}
                    <div
                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 max-w-full border-accent-foreground bg-transparent text-primary backdrop-blur-md transition-colors duration-150 hover:bg-accent-foreground hover:text-white">
                        <div
                            class="mr-1 flex aspect-square h-[14px] w-[14px] animate-pulse rounded-full bg-green-500/50 dark:bg-green-400/50 sm:m-0 md:mr-1"
                            aria-hidden="true">
                            <div class="m-auto h-2 w-2 rounded-full bg-green-500 dark:bg-green-400"></div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <span class="inline whitespace-nowrap sm:hidden md:inline" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</span>
                        </form>
                    </div>
                @endauth
            </div>
            <div class="order-3 sm:order-2 sm:ml-auto">
                <nav class="ml-auto hidden space-x-6 text-sm font-medium sm:block sm:w-full">
                    <nav aria-label="Main" data-orientation="horizontal" dir="ltr"
                         class="relative z-10 flex flex-1 items-center justify-center">
                        <div style="position:relative">
                            <ul data-orientation="horizontal" class="group flex flex-1 list-none items-center justify-center space-x-1" dir="ltr">
                                <li>
                                    <a target="_self"
                                       class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus:outline-none focus:bg-accent focus:text-accent-foreground disabled:opacity-50 disabled:pointer-events-none hover:bg-accent hover:text-accent-foreground data-[state=open]:bg-accent/50 data-[active]:bg-accent/50 h-10 py-2 px-4 group w-max"
                                       href="{{ route('questions') }}" data-radix-collection-item="">{{ __('Questions') }}</a>
                                </li>
                                <li>
                                    <a target="_self"
                                       class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus:outline-none focus:bg-accent focus:text-accent-foreground disabled:opacity-50 disabled:pointer-events-none hover:bg-accent hover:text-accent-foreground data-[state=open]:bg-accent/50 data-[active]:bg-accent/50 h-10 py-2 px-4 group w-max"
                                       href="{{ route('answers') }}" data-radix-collection-item="">{{ __('Answers') }}</a>
                                </li>
                                <li><a target="_self"
                                       class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus:outline-none focus:bg-accent focus:text-accent-foreground disabled:opacity-50 disabled:pointer-events-none hover:bg-accent hover:text-accent-foreground data-[state=open]:bg-accent/50 data-[active]:bg-accent/50 h-10 py-2 px-4 group w-max"
                                       href="{{ route('tags') }}" data-radix-collection-item="">{{ __('Tags') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="absolute left-0 top-full flex justify-center"></div>
                    </nav>
                </nav>
{{--                <nav class="sm:hidden">--}}
{{--                    <button--}}
{{--                        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-ring disabled:opacity-50 disabled:pointer-events-none ring-offset-background hover:text-accent-foreground h-10 py-2 mr-2 px-0 hover:bg-transparent focus-visible:bg-transparent focus-visible:ring-0 focus-visible:ring-offset-0 md:hidden"--}}
{{--                        type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:R2lkr6ba:"--}}
{{--                        data-state="closed">--}}
{{--                        <span class="sr-only">{{ __('Toggle Menu') }}</span></button>--}}
{{--                </nav>--}}
            </div>
            <div class="order-2 flex w-full items-center gap-2 sm:order-3 sm:w-fit mx-6">
                <div class="relative flex">
                    <input
                        type="search"
                        class="relative m-0 block flex-auto rounded-md border border-solid border-neutral-200 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-neutral-500 focus:z-[3] focus:border-primary focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:text-white dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary focus:ring-neutral-300 focus:border-neutral-300 hover:focus:ring-neutral-300 hover:focus:border-neutral-300"
                        placeholder="{{ __('Search') }}"
                        aria-label="Search"
                        id="exampleFormControlInput2"
                        aria-describedby="button-addon2" />
                                        <span
                                            class="flex items-center whitespace-nowrap px-3 py-[0.25rem] text-surface dark:border-neutral-400 dark:text-white [&>svg]:h-5 [&>svg]:w-5"
                                            id="button-addon2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor">
                          <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                      </span>
                </div>

                <div class="flex items-center space-x-6 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:autofill:shadow-autofill">
                    <x-site.language-switch />
                </div>

                <x-site.mode-toggle />
            </div>
        </div>
    </div>
</header>
