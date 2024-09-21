<x-mail::message>
# Introduction

Une nouvelle demande de contact a ete fait via votre site <a href="{{ route('articles.index') }}">Departement</a>.

- Name : {{ $data['name'] }}
- Telephone : {{ $data['telephone'] }}
- Email : {{ $data['email'] }}

****Message :**** <br>

{{ $data['message'] }}

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }} --}}
</x-mail::message>
