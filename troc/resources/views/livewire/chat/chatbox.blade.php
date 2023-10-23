

<div>

 

    {{-- Stop trying to control. --}}
@if($this->selectedConversation && $this->receiverInstance)

@if(auth()->user()->warnings >= 3)
<div class="flex flex-col items-center justify-center h-full">
    <div class="text-2xl font-bold text-neutral-400">You have been banned from sending messages</div>
    <div class="text-sm text-neutral-400">
        To appeal your ban, please contact an admin 
    </div>
</div>


@else
    <div class="border-b-[1px] border-gray-400 h-16 absolute top-0 w-full flex flex-nowrap " >

        <div class="img_container h-12 w-12 my-auto mx-1 ml-6">
            <img class="rounded-full w-full h-full" src="https://ui-avatars.com/api/?name=<?php echo $this->receiverInstance->name; ?>" alt="" />
        </div>


        <div class="name my-auto mx-1" >{{
            $this->receiverInstance?->name
            }}</div>

        <div class="info text-center p-1 mt-auto mr-0 mb-auto ml-auto font-normal flex flex-nowrap">


        <button type="button" onclick="openWidget()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM156,88a12,12,0,1,1-12,12A12,12,0,0,1,156,88ZM40,200V172l52-52,80,80Zm176,0H194.63l-36-36,20-20L216,181.38V200Z"></path></svg>
        </button>

        <input class="hidden"  id="image_url" type="text" name="image_url" value="" wire:model="image_url" />
       
                <div class="info_item cursor-pointer hover:text-neutral-800 my-1 mx-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>
                </div>
            
        </div>
    </div>


    <div id="chatbox_body" class="w-full overflow-hidden  overflow-y-scroll h-4/5  p-4  absolute top-16 ">
        
        @foreach($messages as $message)
        
        @if($message->sender_id == auth()->user()->id) 
    
        <div class="msg_body bg-sky-500 text-white  rounded-lg p-2 mx-3 ml-auto my-1  block w-fit max-w-[80%]">
            
           {{-- if message body starts with https://res.cloudinary --}}
            @if (strpos($message->body, 'https://res.cloudinary') !== false)
            <img class="rounded-lg" src="{{$message->body}}" alt="" />
            @else
            {{$message->body}}
            @endif
            <div class="msg_body_footer w-full flex justify-end items-start">
                <div class="date text-xs my-auto pr-2">{{$message->created_at->format('m: i a')}}</div>
                <div class="read my-auto">
                    @php 
                        if($message->user->id == auth()->id()){
                            if ($message->read == 0) 
                            {
                                // echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 256 256"><path d="M146.8,82.85l-89.6,88a4,4,0,0,1-5.6,0L13.2,133.14a4,4,0,0,1,5.6-5.71l35.6,35,86.8-85.24a4,4,0,0,1,5.6,5.7Zm96-5.65a4,4,0,0,0-5.65,0l-86.8,85.24-21.63-21.24a4,4,0,1,0-5.61,5.7l24.44,24a4,4,0,0,0,5.6,0l89.6-88A4,4,0,0,0,242.85,77.2Z"></path></svg>';
                            }
                            else {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 256 256"><path d="M146.8,82.85l-89.6,88a4,4,0,0,1-5.6,0L13.2,133.14a4,4,0,0,1,5.6-5.71l35.6,35,86.8-85.24a4,4,0,0,1,5.6,5.7Zm96-5.65a4,4,0,0,0-5.65,0l-86.8,85.24-21.63-21.24a4,4,0,1,0-5.61,5.7l24.44,24a4,4,0,0,0,5.6,0l89.6-88A4,4,0,0,0,242.85,77.2Z"></path></svg>';
                            }
                        }
                    @endphp
                    
                </div>
            </div>
        </div>   

        @else
        <div wire:key="{{$message->id}}" class="flex flex-col gap-1 my-2 mx-3 ">
        <div class="flex  items-center gap-2">
        <div  class="msg_body w-fit  bg-neutral-200 rounded-lg p-2  block max-w-[80%]">
            @if (strpos($message->body, 'https://res.cloudinary') !== false)
            <img class="rounded-lg" src="{{$message->body}}" alt="" />
            @else
            {{$message->body}}
            @endif
            <div class="msg_body_footer w-full flex justify-end items-start">
                <div class="date text-xs text-neutral-400 my-auto pr-2">{{$message->created_at->format('m: i a')}}</div>
                <div class="read my-auto">
                    @php 
                    if($message->user->id == auth()->id()){
                        if ($message->read == 0) 
                        {
                            // echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 256 256"><path d="M146.8,82.85l-89.6,88a4,4,0,0,1-5.6,0L13.2,133.14a4,4,0,0,1,5.6-5.71l35.6,35,86.8-85.24a4,4,0,0,1,5.6,5.7Zm96-5.65a4,4,0,0,0-5.65,0l-86.8,85.24-21.63-21.24a4,4,0,1,0-5.61,5.7l24.44,24a4,4,0,0,0,5.6,0l89.6-88A4,4,0,0,0,242.85,77.2Z"></path></svg>';
                        }
                        else {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 256 256"><path d="M146.8,82.85l-89.6,88a4,4,0,0,1-5.6,0L13.2,133.14a4,4,0,0,1,5.6-5.71l35.6,35,86.8-85.24a4,4,0,0,1,5.6,5.7Zm96-5.65a4,4,0,0,0-5.65,0l-86.8,85.24-21.63-21.24a4,4,0,1,0-5.61,5.7l24.44,24a4,4,0,0,0,5.6,0l89.6-88A4,4,0,0,0,242.85,77.2Z"></path></svg>';
                        }
                    }
                @endphp
                </div>
            </div>
        </div>
        {{-- check if message body is This message has been deleted by admin --}}
        @if($message->body != 'This message has been deleted by admin')
        <button  id="report-button" class="cursor-pointer" wire:click="
        confirmReport({{ $message->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#d93f3f" viewBox="0 0 256 256"><path d="M124,136V80a4,4,0,0,1,8,0v56a4,4,0,0,1-8,0Zm4,28a8,8,0,1,0,8,8A8,8,0,0,0,128,164Zm108-36a11.87,11.87,0,0,1-3.5,8.45l-96.05,96.06a12,12,0,0,1-16.9,0h0l-96-96.06a12,12,0,0,1,0-16.9l96.05-96.06a12,12,0,0,1,16.9,0l96.05,96.06A11.87,11.87,0,0,1,236,128Zm-8,0a3.9,3.9,0,0,0-1.16-2.79L130.79,29.15a4,4,0,0,0-5.58,0l-96,96.06a3.94,3.94,0,0,0,0,5.58l96.05,96.06a4,4,0,0,0,5.58,0l96.05-96.06A3.9,3.9,0,0,0,228,128Z"></path></svg>
        </button>
        @endif
    </div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
        @endif
        @endforeach
        
@endif


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

<script>

    window.addEventListener('pushMessage', event => {
        const {createdMessage} = event.detail[0];

        const dataToSend = {
            createdMessage: createdMessage,
    };

    $.ajax({
        type: 'POST', 
        url: '/send-message', 
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

<script type="text/javascript">

    function openWidget() {
        window.cloudinary.openUploadWidget(
            { cloud_name: "dp42cajy0",
              upload_preset: "tdaorffn"
            },
            (error, result) => {
              if (!error && result && result.event === "success") {
                console.log("Done! Here is the image info: ", result.info.secure_url);
                document.getElementById("image_url").value = result.info.secure_url;
                //execute function in livewire controller called uploadImage
                @this.call('uploadImage', result.info.secure_url);
           
            }
        }).open();
    }
</script>



</div>
