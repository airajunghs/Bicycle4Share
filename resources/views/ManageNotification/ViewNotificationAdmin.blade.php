@extends('layouts.default')

@section('contents')
    <div class="container">
        {{-- <div class="background"> --}}
        <div class="container text-center">
            <div class="row align-items-start">

                <div class="col-2" style="margin-top: 5%">
                    {{-- <a href = "/{{ $users->id }}/edit"> --}}

                    @if (Auth::user()->type == 'admin')
                        <a href="/manageNotification/add">
                            <button class="custom-button px-5 py-10">ADD NOTIFICATION</button>
                        </a>
                    @endif
                </div>
                <div class="col">
                    <div class="notifinfo" style="margin-top: 5%">

                        {{-- STUDENT PUNYA VIEW!! --}}
                        <div class="bordernotifinfo">
                            <h1>NOTIFICATION LIST</h1>

                            <table class="table" style="margin-top: 5%;width: 100%">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>DATE</th>
                                        @if (Auth::user()->type == 'admin')
                                            <th>RECEIVER ID</th>
                                        @else
                                            <th>STAFF ID</th>
                                        @endif

                                        <th>MESSAGE</th>
                                        <th>ACTION</th>
                                    </tr>

                                    @if (isset($notifications))
                                        @foreach ($notifications as $notification)
                                            <tr>
                                                <td>{{ $notification->NotifDate }} {{ $notification->NotifTime }}</td>
                                                @if (Auth::user()->type == 'admin')
                                                    <td>{{ $notification->StudentID }}</td>
                                                @else
                                                    <td>{{ $notification->StaffID }}</td>
                                                @endif
                                                <td>{{ $notification->messages->last() ? $notification->messages->last()->NotifMessage : null }}
                                                </td>
                                                {{-- <td>{{ $notification->status }}</td> --}}
                                                <td>
                                                    {{-- {{-- luar form, guna href --}}
                                                    <a href="/manageNotification/{{ $notification->id }}/edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </svg>
                                                    </a>

                                                    {{-- <a href="/manageBicycle/{{ $bicycle->id }}/delete"
                                                        onclick="return confirm('Are You Sure?')">
                                                        <button>Delete</button>
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        {{-- </div> --}}
    </div>
@endsection
