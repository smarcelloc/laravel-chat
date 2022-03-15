<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function listMessages(User $user)
    {
        $userFromID = Auth::user()->id;
        $userToID = $user->id;

        $messages = Message::where([
            ['user_from_id', '=', $userFromID],
            ['user_to_id', '=', $userToID],
        ])
            ->orWhere([
                ['user_from_id', '=', $userToID],
                ['user_to_id', '=', $userFromID],
            ])
            ->orderBy('created_at', 'ASC')->get();

        return response()->json(['messages' => $messages]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userTo = User::findOrFail($request->user_to_id);

        $message = new Message([
            'content' => filter_var($request->message, FILTER_SANITIZE_SPECIAL_CHARS),
            'user_to_id' => $userTo->id,
            'user_from_id' => Auth::user()->id,
        ]);

        $message->save();

        return response()->json(['message' => $message]);
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
}
