<?php

namespace App\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class SendMessage extends Component
{

    public $selectedConversation;
    public $receiverInstance;

    protected $listeners = ['loadSendMessage', 'dispatchMessageSent'];

    public $body;
    public $createdMessage;


    public function loadSendMessage(Request $request)
    {

        $get_result_arr = json_decode($request->getContent());

        $conversation = Conversation::find($get_result_arr->components[0]->calls[0]->params[1][0]->conversation->id);
        $receiverInstance = User::find($get_result_arr->components[0]->calls[0]->params[1][0]->receiver->id);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiverInstance;
        
        

    }

    public function dispatchMessageSent(){
        broadcast(
            new MessageSent(
                auth()->user(),
                $this->createdMessage,
                $this->selectedConversation,
                $this->receiverInstance
            ));
    }

    public function sendMessage(){
        if($this->body == null){
            return;
        }
        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;

        $this->selectedConversation->save();

        $this->dispatch("pushMessage", [
            "createdMessage" => $this->createdMessage->id
        ]);
        
        $this->reset("body");

        $this->dispatch("dispatchMessageSent");
        
    }


    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
