<x-app-layout>
    @slot('header')
    {{$user->name}} | 
    Jumlah Status : {{$user->statuses->count()}} ; Jumlah Followings {{$user->follows->count()}} ; Jumlah Followers : {{$user->followers->count()}}
    @if(Auth::user()->isNot($user)))
    <form action="{{route('following.store', $user)}}" method="POST">
        @csrf
        @if(Auth::user()->follows()->where('following_user_id', $user->id)->first())
        <x-button>- unfollow</x-button>
        @else
        <x-button>+ follow</x-button>
        @endif
    </form>
    @endif
    @endslot
</x-app-layout>