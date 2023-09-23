<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class SendMessage extends Component
{

    public $selectedConversation;
    public $receiverInstance;

    protected $listeners = ['loadSendMessage'];

    public $body;


    public function loadSendMessage(Request $request)
    {

        $get_result_arr = json_decode($request->getContent());

        $conversation = Conversation::find($get_result_arr->components[0]->calls[0]->params[1][0]->conversation->id);
        $receiverInstance = User::find($get_result_arr->components[0]->calls[0]->params[1][0]->receiver->id);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiverInstance;
        

    }

    public function sendMessage(){
        if($this->body == null){
            return;
        }
        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body
        ]);

        $this->selectedConversation->last_time_message = $createdMessage->created_at;

        $this->selectedConversation->save();

        $this->dispatch("pushMessage", [
            "createdMessage" => $createdMessage->id
        ]);
        
        $this->reset("body");


    
    }


    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
