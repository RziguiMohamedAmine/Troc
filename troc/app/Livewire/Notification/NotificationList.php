<?php

namespace App\Livewire\Chat;

use App\Models\Notification;
use Livewire\Component;
use App\Models\User;


class ChatList extends Component
{

    public $conversations;
    public $receiverInstance;
    public $name;
    public $selectedConversation;

    protected $listeners = ['notificationUserSelected' => 'notificationUserSelected', 'refresh'];


    public function render()
    {
        return view('livewire.notification.notification-list');
    }

    public function refresh(){
        $this->render();
    }

    public function mount(){

        $this->conversations = Conversation::where("sender_id", auth()->user()->id)->orWhere("receiver_id", auth()->user()->id)
        ->orderBy("last_time_message", "DESC")->get();
    }


    public function notificationUserSelected(Conversation $conversation, $receiverId){

        $this->selectedConversation = $conversation;
        $receiverInstance = User::find($receiverId);

       $this->dispatch("loadConversation", [
            "conversation" => $conversation,
            "receiver" => $receiverInstance
        ]);

        $this->dispatch("loadSendMessage", [
            "conversation" => $conversation,
            "receiver" => $receiverInstance
        ]);
    }

    public function getChatUserInstance(Conversation $conversation, $request){


        if($conversation->sender_id == auth()->user()->id){
            $this->receiverInstance = User::firstWhere("id", $conversation->receiver_id);
        } else {
            $this->receiverInstance = User::firstWhere("id", $conversation->sender_id);
        }


         if(isset($request)){
            return $this->receiverInstance->$request;
         }
    }

}
