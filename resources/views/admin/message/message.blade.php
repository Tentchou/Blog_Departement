
@extends('bases')

@section('title', 'messages')

@section('bases')

    <div class="title">
        <h2>Détails du message</h2>
        <a href="" class="btns">View all</a>
    </div>

<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Message</th>
            <th>Date Reception</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $message->email }}</td>
            <td>{{ $message->message }}</td>
            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
            <td><a href="#" class="replyIcon" data-id="{{ $message->id }}" title="Reply"><i class='bx bx-reply'></i></a></td>
        </tr>
    </tbody>
</table>


@endsection
