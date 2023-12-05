<div class="w-full flex flex-col gap-4">
    <div class="w-full flex gap-2 place-items-center box-border">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6 icon-size">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>

        <h1 class="text-2xl font-semibold text-black">{{ Auth::user()->username }}</h1>
    </div>
    <div class="flex-grow w-full rounded-lg border-[1px] border-gray-200 bg-white">
        <div class="w-full h-full p-8 box-border flex justify-center items-center gap-8">
            <div
                class="w-72 max-w-72 h-full  p-4 box-border rounded-lg shadow-card flex flex-col justify-start items-center gap-4">
                <div class="w-full min-h-72 h-72 max-h-72">
                    <img class="w-full h-full object-contain bg-gray-50" src="{{ Auth::user()->image ?: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSm15_Q2sAap5FoKCLvFMVyAlyi7Ct91SlMLw&usqp=CAU' }}" alt="">
                </div>
                <form action="/profile/image" method="POST" class="w-full" id="fileUploadForm" enctype="multipart/form-data">
                    @csrf
                    <label
                        class="border-solid border-2 border-gray-300 text-sm font-semibold w-full p-2 rounded-md cursor-pointer flex justify-center">
                        <input name="file" class="hidden" type="file" accept="image/jpeg, .jpeg, .jpg, image/png, .png" onchange="uploadFile()" >Choose Image
                    </label>
                </form>
                <p class="text-black font-base text-sm">File Size: Maximum 10.000.000 bytes (10 Megabytes). File
                    extension
                    allowed: .JPG, .JPEG, .PNG</p>
            </div>
            <div class="flex-grow h-full flex flex-col gap-4">
                <div class="w-full h-full flex flex-col gap-6 text-sm text-black">
                    <h1 class="text-xl pt-2 text-gray-500 font-semibold">Change Biodata</h1>
                    <div class="w-full  flex items-center">
                        <div class="w-1/3">Username</div>
                        @if (Auth::user()->username != null)
                            <h1 class="pr-4">
                                {{ Auth::user()->username }}
                            </h1>
                            <button class="text-green-500"
                                    onclick="Livewire.emit('openModal', 'edit-username-modal')">Edit
                            </button>
                        @else
                            <button class="text-green-500"
                                    onclick="Livewire.emit('openModal', 'edit-username-modal')">Input Username
                            </button>
                        @endif
                    </div>
                    <div class="w-full  flex items-center">
                        <div class="w-1/3">Date of Birth</div>
                        @if (Auth::user()->dob != null)
                            <h1 class="pr-4">
                                {{ Auth::user()->dob }}
                            </h1>
                            <button class="text-green-500" onclick="Livewire.emit('openModal', 'edit-dob-modal')">Edit
                                Date Of Birth
                            </button>
                        @else
                            <button class="text-green-500"
                                    onclick="Livewire.emit('openModal', 'edit-dob-modal')">Input Date of Birth
                            </button>
                        @endif
                    </div>
                    <div class="w-full  flex items-center">
                        <div class="w-1/3">Gender</div>
                        @if (Auth::user()->gender != null)
                            <h1 class="pr-4">
                                {{ Auth::user()->gender }}
                            </h1>
                            <button class="text-green-500" onclick="Livewire.emit('openModal', 'edit-gender-modal')">
                                Edit Gender
                            </button>
                        @else
                            <button class="text-green-500" onclick="Livewire.emit('openModal', 'edit-gender-modal')">
                                Input Gender
                            </button>
                        @endif
                    </div>
                    <div class="w-full  flex items-center">
                        <div class="w-1/3">Phone Number</div>
                        @if (Auth::user()->phone != null)
                            <h1 class="pr-4">
                                {{ Auth::user()->phone }}
                            </h1>
                            <button class="text-green-500" onclick="Livewire.emit('openModal', 'edit-phone-modal')">Edit
                                Phone Number
                            </button>
                        @else
                            <button class="text-green-500" onclick="Livewire.emit('openModal', 'edit-phone-modal')">
                                Input Phone Number
                            </button>
                        @endif
                    </div>
                    <div class="w-full  flex items-center">
                        <div class="w-1/3">Email</div>
                        <h1 class="pr-4">
                            {{ Auth::user()->email }}
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script>
    function uploadFile() {
        document.getElementById('fileUploadForm').submit();
    }
</script>
