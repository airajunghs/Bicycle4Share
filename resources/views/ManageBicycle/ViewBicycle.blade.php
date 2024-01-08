@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col-2"><br>
                        {{-- <a href = "/{{ $users->id }}/edit"> --}}
                        <a href="/manageBicycle/add">
                            <button class="custom-button px-5 py-10">ADD BICYCLE</button>
                        </a>
                    </div>
                    <div class="col"><br>
                        <div class="bikeinfo">

                            {{-- STUDENT PUNYA VIEW!! --}}
                            <div class="borderbikeinfo">
                                <h1>BICYCLE LIST</h1>

                                <form class="form-inline my-2 my-lg-0" method="get"
                                    action="{{ url('/manageBicycle/search') }}">
                                    <div class="mb-3">
                                        <input type="search" name="query" class="form-control" id="searchInput"
                                            placeholder="Search" style="width: 20%; float: right; ">
                                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                                        {{-- </div> --}}
                                </form>


                                <table class="table" style="margin-top: 5%;width: 100%">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>BICYCLE ID</th>
                                            <th>BICYCLE IMAGE</th>
                                            <th>BICYCLE MODEL</th>
                                            <th>BICYCLE STATUS</th>
                                            <th>STUDENT</th>
                                            <th>ACTION</th>
                                        </tr>
                                        @foreach ($bicycles as $bicycle)
                                            <tr>
                                                <td>{{ $bicycle->bicycleID }}</td>
                                                <td>
                                                    @if (isset($bicycle->bicycleImage))
                                                        <img src="/images/bicycleImages/{{$bicycle->bicycleImage}}" width="100px" height="100px" >
                                                    @else
                                                        <img src="{{asset('images\no-image.jpg')}}" width="100px" height="100px">
                                                    @endif
                                                </td>
                                                <td>{{ $bicycle->model }}</td>
                                                <td>{{ $bicycle->status }}</td>
                                                <td>{{ $bicycle->matricid }}</td>
                                                <td>
                                                    {{-- luar form, guna href --}}
                                                    <a href="/manageBicycle/{{ $bicycle->id }}/edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </svg>
                                                    </a>

                                                    {{-- delete icon --}}
                                                    <a href="/manageBicycle/{{ $bicycle->id }}/delete"
                                                        onclick="return confirm('Are You Sure?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-trash"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                            <path
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const bicycleId = row.querySelector('td:nth-child(1)').innerText.toLowerCase();

                    if (bicycleId.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script> --}}
