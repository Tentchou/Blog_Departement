@extends('bases')

@section('title', 'liste des Articles')

@section('bases')


    <a href="{{ route('register') }} " class="btns"><i class='bx bx-plus' style="font-size: 30px;"></i>add users</a>
    <div class="title">
        <h2>Listes Users</h2>
        <a href="{{ route('news.index') }}" class="btns">View all</a>
    </div>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>membre</th>
            <th>Subscribe</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user )
            <tr>

                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>

                <td>
                    <input type="checkbox" id="member-{{ $user->id }}" name="member"
                            @if($user->membre) checked @endif>
                </td>

                <td>
                    <input type="checkbox" id="member-{{ $user->id }}" name="member"
                         @if($user->is_subscribed) checked @endif>
                </td>

                <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a href="{{ route('admin.articles.deleteUsers', $user->id) }}"><i class='bx bx-trash' style='font-size: 30px; color: red;'></i></a>
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
<br>

    {{-- gestion des liens --}}
@endsection

