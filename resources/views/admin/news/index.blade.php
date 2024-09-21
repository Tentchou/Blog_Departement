
@extends('bases')

@section('title', 'liste des news')

@section('bases')


    <a href="{{ route('admin.articles.ajouterNews') }}" class="btns"><i class='bx bx-plus' style="font-size: 30px;"></i>add news</a>
    <div class="title">
        <h2>Recent News/actualites</h2>
        <a href="{{ route('news.index') }}" class="btns">View all</a>
    </div>


   <table>

        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th >Action</th>
        </tr>

        @foreach ($news as $new )
            <tr>
                <td>{{ $new->id }}</td>
                <td>{{ $new->title }}</td>
                <td>
                    <div style="display: flex;">
                        <a href="{{ route('admin.articles.editerNews', ['news'=>$new]) }}"><i class='bx bx-edit' style='font-size: 30px; color: green;'></i></a>
                        <a href="{{ route('admin.articles.deletenews', $new->id) }}"><i class='bx bx-trash' style='font-size: 30px; color: red;'></i></a>
                    </div>
                </td>
            </tr>
        @endforeach

   </table>
    {{-- gestion des liens --}}



@endsection
