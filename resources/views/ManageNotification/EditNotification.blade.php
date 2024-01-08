@extends('layouts.default')

@section('contents')

    <style>
        .submit-message{
            display: flex;
            justify-content: center;
            justify-items: center;
            align-items: center;
        }

        .message{
            display: flex;
            height: 423px;
            padding: 1rem;
            overflow: overlay;
            flex-direction: column-reverse;
            gap: 10px;
        }

        .message-item{
            display: flex;
            gap: 5px;
            flex-direction: column;
        }

        .message-item .item, .message-item small{
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 5px;
        }

        .msg--me {
            align-items:flex-end ;
        }

        .msg--them {
            align-items: flex-start;
        }

        .message-item p {
            width: fit-content;
            border: 1px solid black;
            background-color: #fff;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
    <div class="container">
        {{-- <div class="background"> --}}

        <form action="addMessage" method="POST">
            @csrf
            <div class="container text-center">
                <div class="row align-items-start">

                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="notifinfo" style="margin-top: 5%">

                            {{-- STUDENT PUNYA VIEW!! --}}
                            <div class="bordernotifinfo">
                                @if (Auth::user()->type == 'admin')
                                    <h1>{{$notifications ? $notifications->StudentID : null}}</h1>
                                @else
                                    <h1>{{$notifications ? $notifications->StaffID : null}}</h1>
                                @endif

                                <h6>{{ $notifications ?  \Carbon\Carbon::parse($notifications->NotifDate)->toDateString() : null}}</h6>

                                <div class="message">
                                    @if (isset($notifications))
                                        @foreach ($notifications->messages->reverse() as $messages)
                                            @if (isset($messages->StaffID))
                                                @if (Auth::user()->type == 'admin')
                                                    <div class="message-item msg--me">
                                                    <div class="item">
                                                        <span> {{$messages->StaffID}} : </span><p class="mb-0">{{$messages->NotifMessage}}</p>
                                                    </div>
                                                    <small><i>{{\Carbon\Carbon::parse($messages->created_at)->toDateTimeString()}}</i></small>
                                                </div>
                                                <br>
                                                @else
                                                    <div class="message-item msg--them">
                                                        <div class="item">
                                                            <span> {{$messages->StaffID}} : </span><p class="mb-0">{{$messages->NotifMessage}}</p>
                                                        </div>
                                                        <small><i>{{\Carbon\Carbon::parse($messages->created_at)->toDateTimeString()}}</i></small>
                                                    </div>
                                                    <br>
                                                @endif
                                            @else
                                                @if (Auth::user()->type == 'admin')
                                                    <div class="message-item msg--them">
                                                        <div class="item  msg--them">
                                                            <p class="mb-0">{{$messages->NotifMessage}}</p>:<span> {{$messages->StudentID}}</span>
                                                        </div>
                                                        <small class="msg--them"><i>{{\Carbon\Carbon::parse($messages->created_at)->toDateTimeString()}}</i></small>
                                                    </div>
                                                    <br>
                                                @else
                                                    <div class="message-item msg--me">
                                                        <div class="item  msg--me">
                                                            <p class="mb-0">{{$messages->NotifMessage}}</p>:<span> {{$messages->StudentID}}</span>
                                                        </div>
                                                        <small class="msg--me"><i>{{\Carbon\Carbon::parse($messages->created_at)->toDateTimeString()}}</i></small>
                                                    </div>
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif


                                    <div class="message-item msg--me">
                                        <div class="item">
                                            <span> {{$notifications ? $notifications->StaffID : null}} : </span> <p class="mb-0">{{$notifications ? $notifications->NotifMessage : null}}</p>
                                        </div>
                                        <small><i>{{$notifications ? \Carbon\Carbon::parse($notifications->created_at)->toDateTimeString() : null}}</i></small>
                                    </div>
                                </div>

                                <div class="submit-message">
                                    <textarea cols="10" rows="10" name="message" style="width:80%;height:50px;margin-right:10px"></textarea>
                                    <button type="submit" style="height:50px">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
