<div class="flex flex-col p-8 gap-8 box-border">
    <h1 class="w-full font-bold text-2xl">Insert Date of Birth</h1>
    <form class="w-full flex flex-col gap-8" action="">
        <div class="relative w-full flex gap-1 " x-data="{ dayOpen: false, monthOpen: false, yearOpen: false }">
            <div class="relative w-1/3">
                <select name="date" onfocus="this.size=5;" onblur="this.size=1;" onchange="this.size=1; this.blur();"
                    class="absolute block w-full p-2 rounded-md bg-white text-gray-900 ring-1 ring-gray-300 focus:ring-green-500 ">
                    <option class="hover:bg-gray-200 rounded-md  focus:ring-green-500 p-2" value="">Date</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option class="hover:bg-gray-200 rounded-md focus:ring-green-500   p-2" value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>


            <div class="w-1/3">
                <select name="month"
                    class="max-h-40 w-full p-2 rounded-md bg-white text-gray-900 ring-1 ring-gray-300 focus:ring-green-500 overflow-y-auto">
                    <option value="">Month</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="w-1/3">
                <select name="year"
                    class="max-h-40 w-full p-2 rounded-md bg-white text-gray-900 ring-1 ring-gray-300 focus:ring-green-500 overflow-y-auto">
                    <option value="">Year</option>
                    @for ($i = 1943; $i <= 2009; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

        </div>
        <button
            class="w-full text-xl text-white font-semibold   bg-green-500 rounded-lg flex justify-center p-2 box-border">Save</button>
    </form>
</div>
