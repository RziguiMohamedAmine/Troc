<div>
 

    {{-- Stop trying to control. --}}
    @if ($this->selectedConversation && $this->receiverInstance)
    <div class="border-b-[1px] border-gray-400 h-16 absolute top-0 w-full flex flex-nowrap " >

        <div class="img_container h-12 w-12 my-auto mx-1 ml-6">
            <img class="rounded-full w-full h-full" src="https://ui-avatars.com/api/?name=<?php echo $this->receiverInstance->name; ?>" alt="" />
        </div>


        <div class="name my-auto mx-1" >{{
            $this->receiverInstance?->name
            }}</div>

        <div class="info text-center p-1 mt-auto mr-0 mb-auto ml-auto font-normal flex flex-nowrap">
            <div class="info_item cursor-pointer my-1 mx-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M231.88,175.08A56.26,56.26,0,0,1,176,224C96.6,224,32,159.4,32,80A56.26,56.26,0,0,1,80.92,24.12a16,16,0,0,1,16.62,9.52l21.12,47.15,0,.12A16,16,0,0,1,117.39,96c-.18.27-.37.52-.57.77L96,121.45c7.49,15.22,23.41,31,38.83,38.51l24.34-20.71a8.12,8.12,0,0,1,.75-.56,16,16,0,0,1,15.17-1.4l.13.06,47.11,21.11A16,16,0,0,1,231.88,175.08Z"></path></svg>
            </div>
        
                <div class="info_item cursor-pointer hover:text-neutral-800 my-1 mx-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM156,88a12,12,0,1,1-12,12A12,12,0,0,1,156,88ZM40,200V172l52-52,80,80Zm176,0H194.63l-36-36,20-20L216,181.38V200Z"></path></svg>
                </div>
       
           
                <div class="info_item cursor-pointer hover:text-neutral-800 my-1 mx-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>
                </div>
            
        </div>
    </div>


    <div class="w-full overflow-hidden  overflow-y-scroll h-4/5  p-4  absolute top-16 ">
        
        @foreach($messages as $message)
        
        @if($message->sender_id == auth()->user()->id) 
        <div class="msg_body bg-sky-500 text-white mx-3 ml-auto rounded-lg p-2 my-1  block w-fit max-w-[80%]">
            {{$message->body}}
            <div class="msg_body_footer w-full flex justify-end items-start">
                <div class="date text-sm pr-2">{{$message->created_at->format('m: i a')}}</div>
                <div class="read">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 256 256"><path d="M146.8,82.85l-89.6,88a4,4,0,0,1-5.6,0L13.2,133.14a4,4,0,0,1,5.6-5.71l35.6,35,86.8-85.24a4,4,0,0,1,5.6,5.7Zm96-5.65a4,4,0,0,0-5.65,0l-86.8,85.24-21.63-21.24a4,4,0,1,0-5.61,5.7l24.44,24a4,4,0,0,0,5.6,0l89.6-88A4,4,0,0,0,242.85,77.2Z"></path></svg>
                </div>
            </div>
        </div>   
        @else
        <div class="msg_body  bg-neutral-200 rounded-lg p-2 my-2 mx-3 block max-w-[80%]">
            {{$message->body}}
            <div class="msg_body_footer w-full flex justify-end items-start">
                <div class="date text-sm pr-2">{{$message->created_at->format('m: i a')}}</div>
                <div class="read">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#444" viewBox="0 0 256 256"><path d="M146.8,82.85l-89.6,88a4,4,0,0,1-5.6,0L13.2,133.14a4,4,0,0,1,5.6-5.71l35.6,35,86.8-85.24a4,4,0,0,1,5.6,5.7Zm96-5.65a4,4,0,0,0-5.65,0l-86.8,85.24-21.63-21.24a4,4,0,1,0-5.61,5.7l24.44,24a4,4,0,0,0,5.6,0l89.6-88A4,4,0,0,0,242.85,77.2Z"></path></svg>
                </div>
            </div>
        </div>
        @endif
        @endforeach


    </div>

@else
    <div class="flex flex-col items-center justify-center h-full">
        <div class="text-2xl font-bold text-neutral-400">No Conversations</div>
        <div class="text-sm text-neutral-400">Start a conversation with someone</div>
    </div>
@endif


    <script>
        
        window.addEventListener('loadConversation', event => {
            const {conversation} = event.detail[0];
            const {receiver} = event.detail[0];  

            const dataToSend = {
        conversation: conversation,
        receiver: receiver
        
    };

 
  
    $.ajax({
        type: 'POST', 
        url: '/load-conv', 
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
