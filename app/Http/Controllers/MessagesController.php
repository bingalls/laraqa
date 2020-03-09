<?php

namespace App\Http\Controllers;

use App\Mail\SendMsg;
use App\Message;
use App\Repo\MsgRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        return new Response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return new Response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return View
     */
    public function store(Request $request): View
    {
        $data = $request->all();
        $data['sent'] = true;       // TODO keeping this to 1 DB call simply for now
        $msg = new Message($data);
        $repo = new MsgRepo($msg);
        $redirect = $repo->create($request->all());

        if (in_array($redirect->getStatusCode(), [200, 301, 302], true)) {
            Mail::to(getenv('MAIL_TO'))->send(new SendMsg($data));
            return view('message');
        }

        return view('error');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $messages
     * @return \Illuminate\Http\Response
     */
//    public function show(Message $messages): Response
//    {
//        return new Response();
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $messages
     * @return \Illuminate\Http\Response
     */
//    public function edit(Message $messages): Response
//    {
//        return new Response();
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $messages
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Message $messages): Response
//    {
//        return new Response();
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $messages
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Message $messages): Response
//    {
//        return new Response();
//    }
}
