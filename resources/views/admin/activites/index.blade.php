@extends('bases')

@section('title', 'liste des Activites')

@section('bases')




    <a href="{{ route('admin.activite.createActivite') }}" class="btns"><i class='bx bx-plus' style="font-size: 30px;"></i>add activities</a>

    <div class="title">
        <h2>Recent Activites</h2>
        <a href="" class="btns">View all</a>
    </div>

    <table>
        <tr>
           <th>Id</th>
           <th>Titles</th>
           <th>Groupe</th>
           <th>Options</th>
        </tr>
        @foreach ($activites as $activite )
            <tr>
                <td>{{ $activite->id }}</td>
                <td>{{ $activite->title }}</td>
                <td>{{ $activite->laboratoire_id }}</td>

                <td>
                    <div style="display: flex;">
                        {{-- <a href="{{ route('articles.show', ['article'=>$article]) }}"><i class='bx bx-show' style='font-size: 30px; color: blue;'></i></a> --}}
                        <a href="{{ route('admin.activite.editeractivite', ['activite'=>$activite]) }}" ><i class='bx bx-edit' style='font-size: 30px; color: green;'></i></a>
                        <a href="{{ route('admin.activite.deleteactivite', $activite) }}"><i class='bx bx-trash' style='font-size: 30px; color: red;'></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
     </table>


{{-- {{ $articles->links() }} --}}


    {{-- gestion des liens --}}



@endsection

