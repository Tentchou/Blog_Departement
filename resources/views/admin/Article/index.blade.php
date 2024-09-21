@extends('bases')

@section('title', 'liste des Articles')

@section('bases')




    <a href="{{ route('admin.articles.ajouter') }}" class="btns"><i class='bx bx-plus' style="font-size: 30px;"></i>add article</a>

    <div class="title">
        <h2>Recent Articles</h2>


            <a href="{{ route('admin.articles.all') }}" data-i18n="manageButton" data-bs-toggle="modal" data-bs-target="#manageModal" class="btns">View all</a>

    </div>

        <!-- Modal -->
    <div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header du Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="manageModalLabel" data-i18n="modalTitle">Manage Items</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Corps du Modal -->
                <div class="modal-body">
                    <!-- Tableau -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titles</th>
                                <th>Imgage</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article )
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td><img src="{{ $article->thumbnail }}" alt="image" width="60" height="60" style="border-radius: 50%;"></td>

                                    <td>
                                        <div style="display: flex;">
                                            <a href="{{ route('articles.show', ['article'=>$article]) }}"><i class='bx bx-show' style='font-size: 30px; color: blue;'></i></a>
                                            <a href="{{ route('admin.articles.editer', ['article'=>$article]) }}" ><i class='bx bx-edit' style='font-size: 30px; color: green;'></i></a>
                                            <a href="{{ route('admin.articles.deleteArticle', $article->id) }}"><i class='bx bx-trash' style='font-size: 30px; color: red;'></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Footer du Modal avec un bouton de fermeture -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-i18n="closeButton">Close</button>
                </div>
            </div>
        </div>
    </div>

    <table>
        <tr>
           <th>Id</th>
           <th>Titles</th>
           <th>Options</th>
        </tr>
        @foreach ($articles as $article )
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>

                <td>
                    <div style="display: flex;">
                        <a href="{{ route('articles.show', ['article'=>$article]) }}"><i class='bx bx-show' style='font-size: 30px; color: blue;'></i></a>
                        <a href="{{ route('admin.articles.editer', ['article'=>$article]) }}" ><i class='bx bx-edit' style='font-size: 30px; color: green;'></i></a>
                        <a href="{{ route('admin.articles.deleteArticle', $article->id) }}"><i class='bx bx-trash' style='font-size: 30px; color: red;'></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
     </table>


{{-- {{ $articles->links() }} --}}


    {{-- gestion des liens --}}



@endsection

