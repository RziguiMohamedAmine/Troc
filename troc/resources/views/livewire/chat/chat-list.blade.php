<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="border-b-[1px] border-gray-400 h-16 flex flex-nowrap">
        <div class="font-bold flex px-2 text-lg items-center justify-center text-center">Chat</div>
        <div class="m-auto mr-3 h-11 w-11 ">
            <img class="w-full h-full rounded-full border-r-[1px] border-gray-400" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{auth()->user()->name}}" alt="" />
        </div>
    </div>
    <div class="body p-4">
        @if(count($conversations) > 0)
        @foreach($conversations as $conversation)
        <div wire:key="{{$conversation->id}}" wire:click ="chatUserSelected({{$conversation}}, {{$this->getChatUserInstance($conversation, $name="id")}})" class="chatlist_item cursor-pointer flex flex-nowrap mb-2 w-full rounded-xl bg-neutral-200 p-4">
            <div class="chatlist_img_container m-auto h-11 w-11 ">
                <img class="rounded-full w-full h-full" src="https://ui-avatars.com/api/?name=<?php echo $this->getChatUserInstance($conversation, 'name'); ?>" alt="" />
            </div>
            <div class="chatlist_info p-1 w-4/5 block">
                <div class="top_row flex w-full">
                    <div class="list_username truncate text-sm w-4/5">{{$this->getChatUserInstance($conversation, $name="name")}}</div>
                    <span class="date ml-auto text-xs flex text-neutral-600">{{$conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans()}}</span>
                </div>

                <div class="bottom_row flex flex-nowrap w-full">
                    <div class="message_body w-4/5 truncate font-extralight text-neutral-400">
                       {{$conversation?->messages?->last()?->body}}
                    </div>

                    <div class="unread_count ml-auto text-xs bg-red-500 p-2 rounded-full text-white font-light">0</div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="flex flex-col items-center justify-center h-full">
            <div class="text-2xl font-bold text-neutral-400">No Conversations</div>
            <div class="text-sm text-neutral-400">Start a conversation with someone</div>
        </div>
            @endif

    </div>

    
</div>
