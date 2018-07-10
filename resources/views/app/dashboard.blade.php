@extends('base')
<h1>You</h1>
<form method="post" action="{{ route('auth.logout') }}">
    {{ @csrf_field() }}
    <button type="submit">LOGOUT</button>
</form>