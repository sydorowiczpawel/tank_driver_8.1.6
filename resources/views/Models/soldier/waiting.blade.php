@extends('layouts.app')
@section('content')

<div class="container">
Witaj {{ Auth::user() -> firstName }}!<br><br>

Od teraz jesteś użytkownikiem aplikacji "Tank Driver"<br><br>

Aby móc w pełni korzystać z jej funkcjonalności, administrator musi uzupełnić Twoje dane. Bądź cierpliwy, to nie potrwa długo ;)
</div>
@endsection