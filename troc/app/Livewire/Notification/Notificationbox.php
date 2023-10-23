<?php

namespace App\Livewire\Notification;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Reports;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Laravel\Prompts\alert;

class Notificationbox extends Component
{


    public $selectedConversation;
    public $receiverInstance;
    public $messages;
    public $messages_count;
    public $file;
    public $createdMessage;

    use WithFileUploads;


    public function getListeners(){
        $audh_id = auth()->user()->id;
        return [
            'loadConversation',
            'pushMessage',
            'echo-private:notification.' .$audh_id .',MessageSent' => 'broadcastedMessageReceived'
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

                foreach($this->messages as $message){
                    if($message->user_id != auth()->user()->id){
                        $message->read = 1;
                        $message->save();
                    }
                }

                $this->dispatch("refresh");

        }

        public function pushMessage(Request $request){
            $get_result_arr = json_decode($request->getContent());

            $newMessage = Message::find($get_result_arr->components[0]->calls[0]->params[1][0]->createdMessage);
            $this->messages->push($newMessage);
        }


    public function render()
    {
        return view('livewire.notification.notificationbox');
    }

    public function uploadImage($secureUrl){
        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $this->receiverInstance->id,
            'body' => $secureUrl
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;

        $this->selectedConversation->save();

        $this->dispatch("pushMessage", [
            "createdMessage" => $this->createdMessage->id
        ]);


    }

    public function confirmReport($message_id){

        session()->flash("message", "Reported Successfully");

        $newReport = Reports::create([
            'message_id' => $message_id
        ]);
    }
}
