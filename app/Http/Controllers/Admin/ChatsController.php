<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChatRequest;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChatsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('chat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chats = Chat::with(['sender', 'receiver'])->get();

        return view('admin.chats.index', compact('chats'));
    }

    public function create()
    {
        abort_if(Gate::denies('chat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $senders = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $receivers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.chats.create', compact('receivers', 'senders'));
    }

    public function store(StoreChatRequest $request)
    {
        $chat = Chat::create($request->all());

        return redirect()->route('admin.chats.index');
    }

    public function edit(Chat $chat)
    {
        abort_if(Gate::denies('chat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $senders = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $receivers = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chat->load('sender', 'receiver');

        return view('admin.chats.edit', compact('chat', 'receivers', 'senders'));
    }

    public function update(UpdateChatRequest $request, Chat $chat)
    {
        $chat->update($request->all());

        return redirect()->route('admin.chats.index');
    }

    public function show(Chat $chat)
    {
        abort_if(Gate::denies('chat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chat->load('sender', 'receiver');

        return view('admin.chats.show', compact('chat'));
    }

    public function destroy(Chat $chat)
    {
        abort_if(Gate::denies('chat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chat->delete();

        return back();
    }

    public function massDestroy(MassDestroyChatRequest $request)
    {
        $chats = Chat::find(request('ids'));

        foreach ($chats as $chat) {
            $chat->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
