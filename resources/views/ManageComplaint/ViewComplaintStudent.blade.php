@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">

            <br>

            {{-- STUDENT DAN ADMIN GUNA INTERFACE VIEW SAMA, LETAK CONDITION UNTUK ACTION UNTUK ADMIN --}}

            <div class="container text-center">

                <div style="display: flex; align-items: center;">
                    <h1>{{ Auth::user()->type == 'student' ? 'Student' : 'Admin' }} Information</h1>
                    <a style="margin-left: 50%;" href="/manageComplaint/add"><button class="custom-button px-5 py-10">ADD
                            COMPLAINT</button></a>
                </div>

                <table class="table">
                    <thead>
                    <tbody>

                        <tr>
                            <th scope="row">User ID</th>
                            <th scope="row">:</th>
                            {{-- guna auth untuk display idnumber dekat table ikut user yang login --}}
                            <td>{{ Auth::user()->idnumber }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Full Name</th>
                            <th scope="row">:</th>
                            {{-- guna auth untuk display name dekat table ikut user yang login --}}
                            <td>{{ Auth::user()->name }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Email</th>
                            <th scope="row">:</th>
                            {{-- guna auth untuk display email dekat table ikut user yang login --}}
                            <td>{{ Auth::user()->email }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Phone Number</th>
                            <th scope="row">:</th>
                            {{-- guna auth untuk display phone number dekat table ikut user yang login --}}
                            <td>{{ Auth::user()->phonenum }}</td>
                        </tr>

                    </tbody>
                    </thead>

                </table>

                <div class="container text-center">
                    <div style="display: flex; justify-content: space-between; align-items: center; text-align: left;">
                        <h1>List of Complaint</h1>

                        {{-- Add the search input box here --}}
                        <form class="form-inline my-2 my-lg-0" method="get" action="{{ url('/manageComplaint/search') }}">
                            <div class="mb-3">
                                <input type="search" name="query" class="form-control" id="searchInput" placeholder="Search" style="width: 100%;">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </div>
                        </form>
                    </div><br>

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>DATE</th>
                                <th>ID</th>
                                <th>COMPLAINT</th>
                                <th>Bicycle ID</th>
                                <th>Student ID</th>
                                <th>STATUS</th>
                                <th>REMARKS</th>
                                {{-- ACTION HANYA MUNCUL UNTUK ADMIN SAHAJA --}}
                                @if (Auth::user()->type == 'admin')
                                    <th>ACTION</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                @if (Auth::user()->type == 'admin')
                                    <tr>
                                        <td>{{ $complaint->currentDate }}</td>
                                        <td>{{ $complaint->complaintID }}</td>
                                        <td>{{ $complaint->complaint }}</td>
                                        <td>{{ $complaint->bicycleID }}</td>
                                        <td>{{ $complaint->StudentID }}</td>
                                        <td>{{ $complaint->status }}</td>
                                        <td>{{ $complaint->remarks }}</td>
                                        {{-- ACTION HANYA MUNCUL UNTUK ADMIN SAHAJA --}}
                                        @if (Auth::user()->type == 'admin')
                                            {{-- edit icon --}}
                                            <td><a href="/manageComplaint/{{ $complaint->id }} /edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg></a>

                                                    @if (!$complaint->PenaltyID)
                                                        <a href="/managePenalty/{{ $complaint->id }}/display">
                                                        <button class="custom-button px-2 py-10" style="background-color: green">PENALTY</button></a>
                                                    @endif


                                            </td>
                                        @endif
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $complaint->currentDate }}</td>
                                        <td>{{ $complaint->complaintID }}</td>
                                        <td>{{ $complaint->complaint }}</td>
                                        <td>{{ $complaint->bicycleID }}</td>
                                        <td>{{ $complaint->StudentID }}</td>
                                        <td>{{ $complaint->status }}</td>
                                        <td>{{ $complaint->remarks }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <br>

            <br>

        </div>

    </div>
@endsection
