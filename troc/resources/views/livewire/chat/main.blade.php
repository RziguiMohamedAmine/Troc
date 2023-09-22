<div class="flex p-2 flex-nowrap fixed w-[95%] left-[2.5%] rounded-xl h-[85%] border-[1px] border-gray-400 mt-4">
    {{-- The whole world belongs to you. --}}

        {{-- first-div --}}
        <div class=" w-1/4 h-full border-r-[1px] rounded-xl border-gray-400">
            @livewire("chat.chat-list")
        </div>

        {{-- second-div --}}
        <div class="w-3/4 h-full relative ">
            @livewire("chat.chatbox")
            @livewire("chat.send-message")
        </div>

</div>
