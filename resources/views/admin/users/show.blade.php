@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <td>
                            {{ $user->city->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#sender_chats" role="tab" data-toggle="tab">
                {{ trans('cruds.chat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#receiver_chats" role="tab" data-toggle="tab">
                {{ trans('cruds.chat.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_notifications" role="tab" data-toggle="tab">
                {{ trans('cruds.notification.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_applicatnts" role="tab" data-toggle="tab">
                {{ trans('cruds.applicatnt.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="sender_chats">
            @includeIf('admin.users.relationships.senderChats', ['chats' => $user->senderChats])
        </div>
        <div class="tab-pane" role="tabpanel" id="receiver_chats">
            @includeIf('admin.users.relationships.receiverChats', ['chats' => $user->receiverChats])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_notifications">
            @includeIf('admin.users.relationships.userNotifications', ['notifications' => $user->userNotifications])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_applicatnts">
            @includeIf('admin.users.relationships.userApplicatnts', ['applicatnts' => $user->userApplicatnts])
        </div>
    </div>
</div>

@endsection