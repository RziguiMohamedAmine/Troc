<?php

namespace App\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;



class Chatbox extends Component
{

   
    public $selectedConversation;
    public $receiverInstance;
    public $messages;
    public $messages_count;


    
    public function getListeners(){
        $audh_id = auth()->user()->id;
        return [
            'loadConversation',
            'pushMessage',
            'echo-private:chat.' .$audh_id .',MessageSent' => 'broadcastedMessageReceived'
        ];
    }


    function broadcastedMessageReceived($event){
        $boradcastedMessage = Message::find($event['message']);
        if($this->selectedConversation){
            if((int) $this->selectedConversation->id === (int) $event['conversation_id']){
                $boradcastedMessage->read = 1;
                $boradcastedMessage->save();
                $this->pushMessage($boradcastedMessage->id);
            }
        }
    }

    public function loadConversation(Request $request)
        {
   
            $get_result_arr = json_decode($request->getContent());
    
            $conversation = Conversation::find($get_result_arr->components[0]->calls[0]->params[1][0]->conversation->id);
            $receiverInstance = User::find($get_result_arr->components[0]->calls[0]->params[1][0]->receiver->id);
            $this->selectedConversation = $conversation;
            $this->receiverInstance = $receiverInstance;
            
            $this->messages_count = Message::where("conversation_id", $conversation->id)->count();
            $this->messages = Message::where("conversation_id", $conversation->id)->get();


        }

        public function pushMessage(Request $request){
            $get_result_arr = json_decode($request->getContent());
        
            $newMessage = Message::find($get_result_arr->components[0]->calls[0]->params[1][0]->createdMessage);
            $this->messages->push($newMessage);
        }


    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
