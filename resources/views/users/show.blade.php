<x-app-layout>
    @slot('header')
    {{$user->name}}
    @endslot

    Jumlah Status : {{$user->statuses->count()}} ; Jumlah Followings {{$user->follows->count()}} ; Jumlah Followers : {{$user->followers->count()}}
</x-app-layout>
