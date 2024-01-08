@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">
            <br>

            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="userinfo">

{{-- STAFF VIEW STUDENT PROFILE --}}
                            <div class="borderuserinfo">
                                <h1>STUDENT INFORMATION</h1>

                                <table style="margin-top: 20%; border: none; width: 100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><br></td>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">User ID</th>
                                            <th scope="row">:</th>
                                            <td>{{ $users->idnumber }}</td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Full Name</th>
                                            <th scope="row">:</th>
                                            <td>{{ $users->name}}</td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">Email</th>
                                            <th scope="row">:</th>
                                            <td>{{ $users->email}}</td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">Phone Number</th>
                                            <th scope="row">:</th>
                                            <td>{{ $users->phonenum}}</td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">Resident</th>
                                            <th scope="row">:</th>
                                            <td>{{ $users->resident}}</td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">Year Study</th>
                                            <th scope="row">:</th>
                                            <td>{{ $users->year}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="userinfo2">

                            <div class="borderuserinfo2">
                                <h3>BICYCLE INFORMATION</h3>

                                <table style="margin-top: 20%; border: none; width: 100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><br></td>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bicycle ID</th>
                                            <th scope="row">:</th>
                                            <td>{{$bicycle}}</td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Return Date</th>
                                            <th scope="row">:</th>
                                            <td>{{ $bicycleReturnDate}}</td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">Bicycle color</th>
                                            <th scope="row">:</th>
                                            <td>{{ $color}}</td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">Bicycle model</th>
                                            <th scope="row">:</th>
                                            <td>{{ $model}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
