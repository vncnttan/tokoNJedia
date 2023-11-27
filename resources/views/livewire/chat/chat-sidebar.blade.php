<div class="relative w-60 min-h-screen bg-white border-r-2 border-gray-100" x-data="{showDropdown: false}">
    <div
        class="sticky top-32 left-0 bottom-0  w-full  flex flex-col justify-start items-center text-lg font-semibold text-black ">
        <a href="/merchant" class="w-full flex gap-4 justify-start items-center hover:bg-slate-100 px-6 py-2 box-border cursor-pointer"
            @click="selectedTab = 'home'"
            :class="{ 'text-green-500': selectedTab === 'home', 'text-black': selectedTab !== 'home' }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <h1>Home</h1>
        </a>
    </div>
</div>
