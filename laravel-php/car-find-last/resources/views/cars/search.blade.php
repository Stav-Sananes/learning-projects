@extends('layouts.app')

@section('content')
    <div style="margin:3%">
        <search-bar class="mr-4 mt-4"  style="direction:rtl" search="{{ route('search') }}"></search-bar>
    </div>
@endsection
