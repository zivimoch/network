<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-7">
                <x-card>
                    <form method="post" action="{{route('statuses.store')}}">
                        @csrf
                        <div class="flex item-center">
                            <div class="flex-shrink-0 mr-3">
                                <img src="http://i.pravatar.cc/150" alt="{{Auth::user()->name}}" class="w-10 h-10 rounded-full">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">{{Auth::user()->name}}</div>
                                <div class="reading-relax">
                                    <textarea name="content" class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:rig focus:ring-blue-200 transition duration-200"></textarea></div>
                                <div class="text-right">
                                    <x-button>Post</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>

                <div class="space-y-6 mt-5">
                    <div class="space-y-3">
                        @foreach($statuses as $key => $value)
                        <x-card>
                            <div class="flex item-center">
                                <div class="flex-shrink-0 mr-3">
                                    <img src="http://i.pravatar.cc/150" alt="{{$value->user->name}}" class="w-10 h-10 rounded-full">
                                </div>
                                <div>
                                    <div class="font-semibold">{{$value->user->name}}</div>
                                    <div class="reading-relax">{{$value->content}}</div>
                                    <div class="text-sm text-gray-600">{{$value->created_at->diffForHumans()}}</div>
                                </div>
                            </div>
                        </x-card>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-5">
                <div class="border p-5 rounded-xl bg-white">
                    <h1 class="font-semibold mb-5">Recently Follow</h1>
                    <div class="space-y-5">
                        @foreach(Auth::User()->follows()->limit(5)->get() as $user)
                        <div class="flex item-center">
                            <div class="flex-shrink-0 mr-3">
                                <img src="http://i.pravatar.cc/150" class="w-10 h-10 rounded-full">
                            </div>
                            <div>
                                <div class="font-semibold">{{$user->name}}{{$user->id}}</div>
                                <div class="text-sm text-gray-600">{{$user->pivot->created_at->diffForHumans()}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
