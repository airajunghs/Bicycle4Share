@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">

            <br>

            {{-- STUDENT DAN ADMIN GUNA INTERFACE VIEW SAMA, LETAK CONDITION UNTUK ACTION UNTUK ADMIN --}}

            <div class="container text-center">

                <div style="display: flex; align-items: center;">
                    <h1>{{ Auth::user()->type == 'student' ? 'Student' : 'Admin' }} Information</h1>
                    {{-- <a style="margin-left: 50%;" href="/manageComplaint/add"><button class="custom-button px-5 py-10">ADD COMPLAINT</button></a> --}}
                </div>

                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">User ID</th>
                            <th scope="row">:</th>
                            {{-- guna auth untuk display idnumber dekat table ikut user yang login --}}
                            <td class="text-left">{{ Auth::user()->idnumber }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Full Name</th>
                            <th scope="row">:</th>
                            {{-- guna auth untuk display name dekat table ikut user yang login --}}
                            <td class="text-left">{{ Auth::user()->name }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Email</th>
                            <th scope="row">:</th>
                            {{-- guna auth untuk display email dekat table ikut user yang login --}}
                            <td class="text-left">{{ Auth::user()->email }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Phone Number</th>
                            <th scope="row">:</th>
                            {{-- guna auth untuk display phone number dekat table ikut user yang login --}}
                            <td class="text-left">{{ Auth::user()->phonenum }}</td>
                        </tr>
                    </tbody>
                </table>
                {{-- <div class="container text-center"> --}}
                <div style="text-align: left;">
                    <h1>Application Form</h1>
                </div>

                <form action="/manageComplaint/createComplaint" method="POST">
                    @csrf


                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="row">DATE</th>
                                <th scope="row">:</th>
                                <td><input type="date" name="currentDate" value="" class="inputLatest"></td>
                            </tr>

                            <tr>
                                <th scope="row">CURRENT TIME</th>
                                <th scope="row">:</th>
                                <td><input type="time" id="currentTime" name="currentTime"></td>

                            </tr>

                            <tr>
                                <th scope="row">BICYCLE ID</th>
                                <th scope="row">:</th>
                                <td> <select name="bicycleID" class="inputLatest">
                                        <option value="--Select Student ID--" hidden>--Select Bicycle ID--
                                        </option>
                                        @foreach ($bicycles as $bicycle)
                                            <option value="{{ $bicycle->bicycleID }}">{{ $bicycle->bicycleID }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">PHONE NUMBER</th>
                                <th scope="row">:</th>
                                <td><input type="phoneNum" name="phoneNum" id="phoneNum" class="inputLatest"></td>
                            </tr>

                            <tr>
                                <th scope="row">COMPLAINT</th>
                                <th scope="row">:</th>
                                <td>
                                    <textarea id="complaint" name="complaint" rows="4" cols="50" class="inputLatest"></textarea>
                                </td>


                            </tr>

                        </thead>


                    </table>
                    <div style="margin-left: 80%">
                        <button type="submit" class="custom-button px-5 py-10">SAVE</button>
                    </div><br>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
