<div class="flex flex-col p-8 gap-8 box-border">
    <h1 class="w-full font-bold text-2xl">Insert Date of Birth</h1>
    <form class="w-full flex flex-col gap-8" action="">
        <div class="w-full flex gap-1 " x-data="{ dayOpen: false, monthOpen: false, yearOpen: false }">
            <div class="w-1/4 relative gap-2">
                <button @click="dayOpen = !dayOpen"
                    class="w-full p-2 flex justify-center items-center rounded-md bg-white text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-green-500">Date</button>
                <div x-show="dayOpen" @click.away="dayOpen = false"
                    class="absolute max-h-40 z-50 overflow-y-auto w-full flex flex-col rounded-md bg-white ring-1 ring-black ring-inset focus:outline-none hover:ring-green-500 p-2 my-2 gap-2 box-border ">
                    @for ($i = 1; $i <= 31; $i++)
                        <a class="w-full hover:bg-gray-200 p-2  rounded-md box-border text-black text-sm"
                            href="">{{$i}}</a>
                    @endfor
                </div>
            </div>
            <div class="w-1/4 relative gap-2">
                <button @click="monthOpen = !monthOpen"
                    class="w-full p-2 flex justify-center items-center rounded-md bg-white text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-green-500">Month</button>
                <div x-show="monthOpen" @click.away="monthOpen = false"
                    class="absolute max-h-40 z-50 overflow-y-auto w-full flex flex-col rounded-md bg-white ring-1 ring-black ring-inset focus:outline-none hover:ring-green-500 p-2 my-2 gap-2 box-border ">
                    @for ($i = 1; $i <= 12; $i++)
                        <a class="w-full hover:bg-gray-200 p-2  rounded-md box-border text-black text-sm"
                            href="">{{$i}}</a>
                    @endfor
                </div>
            </div>
            <div class="w-1/4 relative gap-2">
                <button @click="yearOpen = !yearOpen"
                    class="w-full p-2 flex justify-center items-center rounded-md bg-white text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-green-500">Year</button>
                <div x-show="yearOpen" @click.away="yearOpen = false"
                    class="absolute max-h-40 z-50 overflow-y-auto w-full flex flex-col rounded-md bg-white ring-1 ring-black ring-inset focus:outline-none hover:ring-green-500 p-2 my-2 gap-2 box-border ">
                    @for ($i = 1943; $i <= 2009; $i++)
                        <a class="w-full hover:bg-gray-200 p-2  rounded-md box-border text-black text-sm"
                            href="">{{$i}}</a>
                    @endfor
                </div>
            </div>
        </div>
        <button
            class="w-full text-xl text-white font-semibold   bg-green-500 rounded-lg flex justify-center p-2 box-border">Save</button>
    </form>
</div>
