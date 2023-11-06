<div class="w-1/3 flex flex-col justify-center gap-8 p-4 box-border bg-white">
    <div class="w-full">
        <h1 class="font-bold text-2xl">Edit Username</h1>
    </div>
    <form class="w-full flex flex-col gap-8" method="">
        @csrf
        <div class="w-full flex flex-col gap-1">
            <label for="">Name</label>
            <input class="input-style" type="text">
            <label for="">Username can be seen by others</label>
        </div>
        <button class="w-full text-white font-bold bg-green-500">Save</button>
    </form>
</div>
