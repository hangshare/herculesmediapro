@extends('layouts.main')
@section('content')

<p> {{ $user->fname }} </p>
<p> {{ $user->lname }} </p>
<p> {{ $user->username }} </p>
<p> {{ $user->email }} </p>
<p> {{ $user->password }} </p>

@endsection