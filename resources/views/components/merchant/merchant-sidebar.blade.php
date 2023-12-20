<div class="fixed top-28 left-0 bottom-0 w-60  z-10 bg-white overflow-y-auto border-r-2 border-gray-100"
     x-data="{ showDropdown: false }">
    <div class=" h-full  flex flex-col justify-start items-center text-lg font-semibold ">
        <a href="/merchant"
           class="w-full flex gap-4 justify-start items-center hover:bg-slate-100 px-6 py-2 box-border cursor-pointer hover:text-black hover:font-bold {{ request()->route()->getName() == "merchant-dashboard" ? '!text-green-500' : 'text-gray-600' }}"
           @click="selectedTab = 'notProduct';">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
            </svg>
            <h1>Home</h1>
        </a>

        <a href="/merchant/chat"
           class="w-full flex gap-4 justify-start items-center hover:bg-slate-100 px-6 py-2 box-border cursor-pointer hover:text-black hover:font-bold {{ request()->route()->getName() == "merchant-chat" ? '!text-green-500' : 'text-gray-600' }}"
           @click="selectedTab = 'notProduct';">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/>
            </svg>
            <h1>Chat</h1>
        </a>
        <a href="/merchant/transactions"
           class="w-full flex gap-4 justify-start items-center hover:bg-slate-100 px-6 py-2 box-border cursor-pointer hover:text-black hover:font-bold {{ request()->route()->getName() == "merchant-transaction" ? '!text-green-500' : 'text-gray-600' }}"
           @click="selectedTab = 'notProduct';">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
            </svg>
            <h1>Transactions</h1>
        </a>
        <a href="/merchant/profile"
           class="w-full flex gap-4 justify-start items-center hover:bg-slate-100 px-6 py-2 box-border cursor-pointer hover:text-black hover:font-bold
           {{ request()->route()->getName() == "merchant-profile" ? '!text-green-500' : 'text-gray-600' }}"
           @click="selectedTab = 'notProduct';">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
            </svg>
            <h1>Profile</h1>
        </a>
        <a class="z-10 w-full flex gap-4 justify-start items-center hover:bg-slate-100 px-6 py-2 box-border cursor-pointer hover:text-black hover:font-bold"
           @click="selectedTab = 'product'; showDropdown = !showDropdown"
           :class="{ '!text-green-500': showDropdown, 'text-gray-600': showDropdown }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z"/>
            </svg>
            <h1>Product</h1>
            <div class="ml-auto">
                <svg x-show="!showDropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                </svg>
                <svg x-show="showDropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5"/>
                </svg>
            </div>
        </a>
        <div class="w-full flex gap-4 justify-start">
            <div x-show="showDropdown" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="transform translate-y-[-100%] opacity-0"
                 x-transition:enter-end="transform translate-y-0 opacity-100"
                 x-transition:leave="transition ease-out duration-300"
                 x-transition:leave-start="transform translate-y-0 opacity-100"
                 x-transition:leave-end="transform translate-y-[-50%] opacity-0"
                 class="z-0 w-full bg-white  rounded-md text-sm font-normal text-start">
                <div class="pl-4">
                    <a href="/merchant/add-product" @click="selectedTab = 'product';"
                       class=" block w-full pl-6 rounded-l-md py-2 hover:bg-slate-100 text-gray-600 cursor-pointer hover:text-black hover:font-bold">Add
                        Product</a>
                </div>
                <div class="pl-4">
                    <a href="/merchant/manage-product" @click="selectedTab = 'product';"
                       class="block w-full pl-6 rounded-l-md py-2 hover:bg-slate-100 cursor-pointer hover:text-black hover:font-bold
                       {{ request()->route()->getName() == "merchant-manage-product" ? '!text-green-500' : 'text-gray-600' }}
                       ">Product
                        List</a>
                </div>
            </div>
        </div>
    </div>
</div>
