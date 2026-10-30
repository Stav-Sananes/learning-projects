@extends('layouts.app')

@section('content')
    <div style="margin:3%">
        <search-bar-bike class="mr-4 mt-4" style="direction:rtl" search="{{ route('searchBike') }}"></search-bar-bike>
    </div>
@endsection
