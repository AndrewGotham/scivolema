<aside class="w-full">
    <div class="rounded-lg border bg-card text-card-foreground lg:w-auto mb-4">
        <div class="flex flex-col space-y-1.5 p-6">
            <h3 class="text-lg font-semibold leading-none tracking-tight">Latest Questions</h3>
        </div>
        <div class="p-6 pt-0 grid gap-4">
            <div
                class="flex items-center rounded-md pl-2 hover:bg-background/40 hover:backdrop-blur-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="lucide lucide-map-pin">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <p class="ml-2 mr-auto text-sm font-medium leading-none">The very last question</p>
            </div>
        </div>
        <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full"></div>
        <div class="flex items-center p-6 pt-0">
            <button class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background hover:bg-accent hover:text-accent-foreground h-10 py-2 px-4 w-full" disabled="">
                See more...
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="mr-2 h-4 w-4">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="rounded-lg border bg-card text-card-foreground lg:w-auto">
        <div class="flex flex-col space-y-1.5 p-6">
            <h3 class="text-lg font-semibold leading-none tracking-tight">Latest Answers</h3>
        </div>
        <div class="p-6 pt-0 grid gap-4">
            <a target="_blank" class="flex items-center rounded-md pl-2 hover:bg-background/40 hover:backdrop-blur-lg" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="lucide lucide-pencil">
                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                    <path d="m15 5 4 4"></path>
                </svg>
                <p class="ml-2 mr-auto text-sm font-medium leading-none">Very last answer</p>
                    </a>
                    <a
                        target="_blank"
                        class="flex items-center rounded-md pl-2 hover:bg-background/40 hover:backdrop-blur-lg"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="lucide lucide-pencil">
                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                            <path d="m15 5 4 4"></path>
                        </svg>
                        <p class="ml-2 mr-auto text-sm font-medium leading-none">Just before one</p>
                    </a>
                    <a target="_blank"
                           class="flex items-center rounded-md pl-2 hover:bg-background/40 hover:backdrop-blur-lg"
                           href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="lucide lucide-pencil">
                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                            <path d="m15 5 4 4"></path>
                        </svg>
                        <p class="ml-2 mr-auto text-sm font-medium leading-none">Third from the end</p>
                <div class="flex h-16 w-16 items-center justify-end">Wow!</div>
            </a>
        </div>
        <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full"></div>
        <div class="flex items-center p-6 pt-0"><a
                class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background hover:bg-accent hover:text-accent-foreground h-10 py-2 px-4 w-full"
                href="{{ route('answers') }}">
                See more...
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="mr-2 h-4 w-4">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a></div>
    </div>
</aside>
