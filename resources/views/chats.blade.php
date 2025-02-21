@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5 pt-4 pb-4" style="width: 90%;">
    <div class="row justify-content-start">
        <div class="col-md-3 d-none d-md-block">
            <div class="card mb-2">
                <div class="card-header">
                    Chats
                </div>
                <div class="card-body d-flex flex-column gap-1">
                    <ul class="list-group list-group-flush">
                        @foreach($friends as $friend)
                        <li class="list-group-item" style="font-size: .6rem; display: flex; justify-content: space-between; align-items: center;">
                            <a href="{{ route('chats.friend', $friend->id) }}" style="text-decoration:none; color:black; font-size: .6rem;">
                                {{ $friend->fname }} {{ $friend->lname }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-12">
            <!-- Post Input -->
            <div class="card">
                <div class="card-header">
                    Ezzer Dave
                </div>
                <div class="card-body d-flex flex-column" style="min-height: 80vh; max-height: 80vh;">
                    <div class="chats" id="chatsHere" style="flex: 1 1 100%; display: flex; flex-direction: column; gap: 1rem; height: 100%; overflow-y: scroll;">
                        <div class="chat__wrapper" style="display: flex; width: 100%; justify-content: flex-start;">
                            <div class="chat" style="display: flex; flex-direction: column; gap:.5rem; min-width: 20px; max-width:60%; width: fit-content;">
                                <div class="message" style=" background-color: #e9ecef; border-radius: 1rem; padding: .7rem; width: fit-content; align-self: flex-start;">

                                    <p style="font-size: .8rem; margin: 0;">
                                        Nganong sigue si sarginie
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="chat__wrapper" style="display: flex; width: 100%; justify-content: flex-end;">
                            <div class="chat" style="display: flex; flex-direction: column; gap:.5rem; min-width: 20px; max-width:60%; width: fit-content;">
                                <div class="message" style=" background-color: #006AFF; border-radius: 1rem; padding: .7rem; width: fit-content; align-self: flex-end;">

                                    <p style="font-size: .8rem; margin: 0; color: white;">
                                        Nganong Tender Juicy Hot Dog ug Payong sa GC na gi Sigue man kaayog Khayat
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-1 mt-2">
                        <!-- Make the input and align center the text vertically -->
                        <input type="text" id="message_input" name="message" placeholder="Type a message" style="font-size: .7rem; border-radius: 5rem; flex: 1 1 100%; padding: .6rem 1rem; border: 1px solid black;"></input>
                        <button onclick="sendChat()" class="btn btn-primary w-auto px-4" style="font-size: .7rem; gap: .5rem; border-radius: 5rem">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection