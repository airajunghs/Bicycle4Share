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

{{-- SEBAB AMBIK SPECIFIC COMPLAINT ID UNTUK DISPLAY --}}
                <form action="/managePenalty/add/{{$complaint->id}}" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="row">DATE</th>
                                <th scope="row">:</th>
                                <td><input type="date" id="currentDate" name="currentDate" class="inputLatest"></td>
                            </tr>

                            <tr>
                                <th scope="row">CURRENT TIME</th>
                                <th scope="row">:</th>
                                <td><input type="time" id="currentTime" name="currentTime" class="inputLatest"></td>

                            </tr>

                            <tr>
                                <th scope="row">COMPLAINT ID</th>
                                <th scope="row">:</th>
                                <td>{{ isset($complaint) ? $complaint->complaintID : null }}</td>
                            </tr>

                            <tr>
                                <th scope="row">AMOUNT</th>
                                <th scope="row">:</th>
                                <td>
                                    <label for="PenaltyAmount">RM</label>
                                    <input type="number" id="PenaltyAmount" name="PenaltyAmount" step="0.01" min="0.01"
                                        required class="inputLatest">
                                </td>
                            </tr>



                            <tr>
                                <th scope="row">REMARK</th>
                                <th scope="row">:</th>
                                <td>
                                    <textarea id="PenaltyDescription" name="PenaltyDescription" rows="4" cols="50" class="inputLatest"></textarea>
                                </td>
                            </tr>

                        </thead>


                    </table>
                    <div style="margin-left: 80%">
                        <button type="submit" class="custom-button px-5 py-10">SAVE</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
