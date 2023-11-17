<div class="flex-grow w-96 rounded-lg drop-shadow-md bg-white">
    <div class="relative w-full h-full flex flex-col items-center">
        <div class="w-full flex items-center gap-4 p-4 box-border border-b-[1px]">
            <a class="w-12 h-12 rounded-full">
                <img class="w-full h-full rounded-full object-cover" src="{{ Auth::user()->image }}" alt="">
            </a>
            <h1 class="font-semibold">{{ Auth::user()->username }}</h1>
        </div>
        <div class="w-full flex flex-col items-center gap-4 p-4 box-border border-b-[1px] ">
            <div class="w-full flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <svg class="icon-size" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/>
                    </svg>

                    Balance
                </div>
                <h1 class="">Rp{{ Auth::user()->balance }}</h1>
            </div>
        </div>
        <div class="w-full flex items-center gap-4 p-4 box-border hover:bg-gray-200 cursor-pointer">
            <a class="w-full h-full" href="/profile">
                <button class="w-full flex items-center gap-3" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="icon-size">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>

                    General
                </button>
            </a>
        </div>
        <div class="w-full flex items-center gap-4 p-4 box-border hover:bg-gray-200 cursor-pointer">
            <a class="w-full h-full" href="/profile/location">
                <button class="w-full flex items-center gap-3" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="icon-size">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                    </svg>
                    Location
                </button>
            </a>
        </div>
        <form class="w-full flex items-center gap-4 p-4 box-border hover:bg-gray-200 cursor-pointer"
              action="/logout"
              method="GET">
            <button class="w-full flex items-center gap-3" type="submit">
                <svg class="icon-size" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                </svg>

                Logout
            </button>
        </form>
    </div>
</div>
