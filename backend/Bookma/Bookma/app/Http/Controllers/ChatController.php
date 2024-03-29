<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\ChatStoreRequest;

use App\ChatRoom;
use App\ChatRoomUser;
use App\ChatMessage;
use App\UserProfile;
use App\User;

use App\Events\ChatPusher;



class ChatController extends Controller
{

    public function room($id)
    {

        return view('pages.chat.chatRoom');
    }

    public function store(ChatStoreRequest $request,$id){

        $user = Auth::user();
        $matching_user_id = $id;
        
        // 自分の持っているチャットルームを取得
        $current_user_chat_rooms = ChatRoomUser::where('user_id', Auth::id())
        ->pluck('chat_room_id');
    
        // 自分の持っているチャットルームからチャット相手のいるルームを探す
        $chat_room_id = ChatRoomUser::whereIn('chat_room_id', $current_user_chat_rooms)
            ->where('user_id', $matching_user_id)
            ->pluck('chat_room_id');
            
    
        // なければ作成する
        if ($chat_room_id->isEmpty()){
    
            ChatRoom::create(); //チャットルーム作成
            
            $latest_chat_room = ChatRoom::orderBy('created_at', 'desc')->first(); //最新チャットルームを取得
            
            $chat_room_id = $latest_chat_room->id;

            // 新規登録 モデル側 $fillableで許可したフィールドを指定して保存
            ChatRoomUser::create( 
            ['chat_room_id' => $chat_room_id,
            'user_id' => Auth::id()]);
    
            ChatRoomUser::create(
            ['chat_room_id' => $chat_room_id,
            'user_id' => $matching_user_id]);
        }
    
        // チャットルーム取得時はオブジェクト型なので数値に変換
        if(is_object($chat_room_id)){
            $chat_room_id = $chat_room_id->first();
        }

        if (Auth::id() != $matching_user_id){
        
            $chat_messages = new ChatMessage;
            $chat_messages->chat_room_id = $chat_room_id;
            $chat_messages->user_id = $user->id;
            $chat_messages->message = $request->message;
            $chat_messages->save();

        }

        event(new ChatPusher($chat_messages));

        return redirect()->route('chat.room', $matching_user_id);
    
    }

    public function destroy($id,$userId)
    {
        if(Auth::id() != $userId) {
            return response()->json([
                'message' => "削除する権限がありません",
            ], 500);
        }

        $chat_messages = ChatMessage::find($id);
        event(new ChatPusher($chat_messages));
        $chat_messages->delete();

        return response()->json([
            'message' => "削除成功",
        ], 200);
    }

    public function roomJson($id) {

        $user = Auth::user();

        // 相手のID
        $to_user_id = $id;
        $to_user = User::where('id', $id)
        ->first();

        // 自分の持っているチャットルームを取得
        $user_chat_rooms = ChatRoomUser::where('user_id', Auth::id())
        ->pluck('chat_room_id');

        // 自分の持っているチャットルームからチャット相手のいるルームを探す
        $chat_room_id = ChatRoomUser::whereIn('chat_room_id', $user_chat_rooms)
            ->where('user_id', $to_user_id)
            ->pluck('chat_room_id');

        // 新規チャットルームの場合
        if (!$chat_room_id->count()){

            $chat_messages = [];

        }else{

        $chat_messages = ChatMessage::with('user')->where('chat_room_id', $chat_room_id)
        ->get();
        }

        return response()->json([
            'chat_messages' => $chat_messages,
            'to_user' => $to_user,
            'auth_id' => Auth::id(),
        ], 200);
    } 

}
