<div class=" w-full absolute bottom-0 flex flex-nowrap py-2">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    
    @if($selectedConversation && auth()->user()->warnings < 3)
    <form wire:submit.prevent="sendMessage" action="" class="w-full">
        <div class="custom_form_group px-2 flex flex-nowrap my-auto ml-0 w-full">
            <input wire:model="body" type="text" class="control border-0 my-auto mx-0 w-[90%] outline-none focus:outline-none focus:ring-0 focus:border-gray-900 bg-neutral-200 rounded-xl" placeholder="Type a message" />
            <button type="submit" class="submit text-center  w-[10%] font-bold text-sky-500 ">Send </button>
        </div>
    </form>
    @endif
    

    <script>
    
        window.addEventListener('loadSendMessage', event => {
            const {conversation} = event.detail[0];
            const {receiver} = event.detail[0];  

            const dataToSend = {
            conversation: conversation,
            receiver: receiver
        
    };
  
    $.ajax({
        type: 'POST', 
        url: '/load-send-message', 
        data: dataToSend,
        success: function(response) {
        
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });

        });

    </script>

    
</div>
