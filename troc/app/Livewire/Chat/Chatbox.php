<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class Chatbox extends Component
{

   
    public $selectedConversation;
    public $receiverInstance;
    public $messages;
    public $messages_count;
    public $paginate = 10;


    protected $listeners = ['loadConversation', 'pushMessage'];

    

    public function loadConversation(Request $request)
        {
   
            $get_result_arr = json_decode($request->getContent());
    
            $conversation = Conversation::find($get_result_arr->components[0]->calls[0]->params[1][0]->conversation->id);
            $receiverInstance = User::find($get_result_arr->components[0]->calls[0]->params[1][0]->receiver->id);
            $this->selectedConversation = $conversation;
            $this->receiverInstance = $receiverInstance;
            
            $this->messages_count = Message::where("conversation_id", $conversation->id)->count();
            $this->messages = Message::where("conversation_id", $conversation->id)
                ->skip($this->messages_count - $this->paginate)
                ->take($this->paginate)->get();

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
