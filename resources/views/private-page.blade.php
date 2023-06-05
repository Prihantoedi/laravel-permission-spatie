@extends('layouts.app')

@section('content')
    <a href="{{route('logout')}}">Logout</a>
    <h2>This Page is Only for authenticated user</h2>
    

    {{-- untuk menggunakan permission di blade, gunakan seperti ini --}}
    @role('writer')
    <div>This text can bee seen by writer user only</div>
    @endrole

    @role('writer')
        <form onsubmit="return confirm('Publish post ini?');" action="{{ route('post.publish', 1) }}" method="POST">
            @csrf
            @method('PUT')

            <button type="submit" class="btn btn-sm btn-info">Publish</button>
        </form>
    @endrole


    {{-- atau bisa juga menggunakan permission dengan model seperti ini --}}

    @can('unpublish post')

    <form onsubmit="return confirm('Unpublish post ini?')" action="{{route('post.unpublish', 1)}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-sm btn-info">Unpublish</button>
    </form>

    @endcan



@endsection

