@extends('layouts.default')

@section('contents')
    <div class="container">
        <h1>LIST OF STUDENT</h1>

        <div>
            {{-- Add the search input box here --}}
            <form class="form-inline my-2 my-lg-0" method="get" action="{{ url('/manageUserProfile/search') }}">
                <div class="mb-3">
                    <input type="search" name="query" class="form-control" id="searchInput" placeholder="Search"
                        style="width: 20%; float: right;">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    {{-- </div> --}}
            </form>
        </div>

        <table class="table">


            <thead>
                <tr>
                    <th>STUDENT ID</th>
                    <th>PROFILE</th>
                    <th>ACTION</th>
                    <td>

                        {{-- <th>Category</th>
                     <th>Gender</th>
                     <th>Phone Number</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        @if ($user->type == 'student')
                            <td>{{ $user->idnumber }}</td>
                            <td><a href="/manageUserProfile/{{ $user->id }}/viewStudent">Details</a></td>
                            <td>
                                <a href="/manageUserProfile/{{ $user->id }}/delete"
                                    onclick="return confirm('Are You Sure?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </a>
                            </td>
                        @endif
                @endforeach
            </tbody>
            <tr>

                {{-- <td><a href = "{{route('users.create') }}" class="btn btn-success">Add New User</a></td> --}}
            </tr>
        </table>

        <a style="margin-left: 70%;" href="{{ url('/manageUserProfile/add') }}"><button class="custom-button px-5 py-10">ADD
                STUDENT</button></a>

    </div>
@endsection
