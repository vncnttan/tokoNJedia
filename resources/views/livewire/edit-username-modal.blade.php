<div class="flex flex-col p-8 gap-8 box-border">
    <h1 class="w-full font-bold text-2xl">Edit Username</h1>
    <form class="w-full flex flex-col gap-8" action="/profile" method="POST">
        @method('PUT')
        @csrf
        <div class="w-full flex flex-col gap-1 ">
            <p class="text-sm text-gray-500">Name</p>
            <input class="input-style" type="text" value="{{Auth::user()->username}}" name="username">
            <p class="text-sm text-gray-500">Name could be seen by others</p>
        </div>
        <button class="w-full text-xl text-white font-semibold   bg-green-500 rounded-lg flex justify-center p-2 box-border">Save</button>
    </form>
</div>
