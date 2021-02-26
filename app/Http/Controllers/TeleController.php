<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;



class TeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function teleUpdates()
    {
        $result = Telegram::getUpdates();
        $text = $result["message"]["text"];
        $chat_id = $result['message']['chat']['id'];
        $name = $result['message']['form']['username'];
        $first_name = $result['message']['form']['first_name'];
        $last_name = $result['message']['form']['last_name'];

        if($text == "/start") {
            $reply = "Hello World!";
            Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text' => $reply
            ]);
        }

        // dd($updates);
        // dd(end($updates)['message']['text']);
        // switch(end($updates)['message']['text']) {
        //     case '/start':
        //         Telegram::sendMessage([
        //             "chat_id" => "CHAT_ID",
        //             "parse_mode" => "HTML",
        //             "text" => "Добро пожаловать!",
        //         ]);
        //         break;
        //     case '/stop':
        //         Telegram::sendMessage([
        //             "chat_id" => "CHAT_ID",
        //             "parse_mode" => "HTML",
        //             "text" => "Пока!",
        //         ]);
        //         break;
        // }

        $response = Telegram::forwardMessage([
            'chat_id' => 'CHAT_ID',
            'from_chat_id' => 'FROM_CHAT_ID',
              'message_id' => 'MESSAGE_ID'
          ]);

          $messageId = $response->getMessageId();
          dd($messageId);

    }

}
