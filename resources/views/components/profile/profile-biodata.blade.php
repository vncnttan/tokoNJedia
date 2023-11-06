<div class="flex-grow w-full rounded-lg shadow-card  bg-white">
    <div class="w-full h-full p-8 box-border flex justify-center items-center gap-8">
        <div
            class="w-[330px] h-full p-4 box-border rounded-lg shadow-card flex flex-col justify-start items-center gap-4">
            <div class="w-full">
                <img class="w-full h-full object-cover" src="{{ Auth::user()->image }}" alt="">
            </div>
            <label
                class="border-solid border-2 border-gray-300 text-sm font-semibold w-full p-2 font-mandala rounded-md cursor-pointer flex justify-center">
                <input class="hidden" type="file" accept="image/jpeg, .jpeg, .jpg, image/png, .png">Choose Image
            </label>
            <p class="text-black font-base text-sm">File Size: Maximum 10.000.000 bytes (10 Megabytes). File extension
                allowed: .JPG, .JPEG, .PNG</p>
        </div>
        <div class="flex-grow h-full flex flex-col">
            <h1 class="text-3xl text-black font-semibold">Edit Biodata</h1>
            <div class="w-full h-full text-lg text-black">
                <div class="w-full py-4 flex items-center">
                    <div class="w-1/3">Username</div>
                    @if (Auth::user()->username != null)
                        <h1 class="pr-4">
                            {{ Auth::user()->username }}
                        </h1>
                        <button class="text-green-500">Edit</button>
                    @else
                        <button class="text-green-500">Input Username</button>
                    @endif
                </div>
                <div class="w-full py-4 flex items-center">
                    <div class="w-1/3">Date of Birth</div>
                    @if (Auth::user()->dob != null)
                        <h1 class="pr-4">
                            {{ Auth::user()->dob }}
                        </h1>
                        <button class="text-green-500">Edit Date Of Birth</button>
                    @else
                        <button class="text-green-500">Input Date of Birth</button>
                    @endif
                </div>
                <div class="w-full py-4 flex items-center">
                    <div class="w-1/3">Gender</div>
                    @if (Auth::user()->gender != null)
                        <h1 class="pr-4">
                            {{ Auth::user()->gender }}
                        </h1>
                        <button class="text-green-500">Edit Gender</button>
                    @else
                        <button class="text-green-500">Input Gender</button>
                    @endif
                </div>
                <div class="w-full py-4 flex items-center">
                    <div class="w-1/3">Phone Number</div>
                    @if (Auth::user()->phone != null)
                        <h1 class="pr-4">
                            {{ Auth::user()->phone }}
                        </h1>
                        <button class="text-green-500">Edit Phone Number</button>
                    @else
                        <button class="text-green-500">Input Phone Number</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
