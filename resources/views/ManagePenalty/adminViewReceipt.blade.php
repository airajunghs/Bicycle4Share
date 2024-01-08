@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">

            <br>

            {{-- STUDENT DAN ADMIN GUNA INTERFACE VIEW SAMA, LETAK CONDITION UNTUK ACTION UNTUK ADMIN --}}

            <div class="container text-center">

                <div style="display: flex; align-items: center;">
                    <h1>{{ Auth::user()->type == 'student' ? 'Student' : 'Admin' }} Information</h1>
                    <a style="margin-left: 50%;" href="/manageComplaint/add"><button class="custom-button px-5 py-10">EDIT
                            ACCOUNT BANK DETAILS</button></a>
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
                    <div style="text-align: left;">
                        <h1>Upload Receipt Penalty</h1>
                    </div>

                    <div class="backgroundUploadReceipt">
                        @foreach ($penalties as $penalty)
                            {{ $penalty->PenaltyID }}
                        @endforeach

                        <br><br>

                        <div style="margin-right: 70%">
                            <h2>QR CODE:</h2>
                            <img src="{{ asset('images/bankaccountqr.png') }}" alt="bankaccountqr" width="200"
                                height="200">
                            <h3>SCAN QR CODE</h3>
                            <br><br>

                            <input type="file" name="image" id="imageInput" accept="image/*" onchange="previewImage()"
                                required>
                            <center>
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display: none; max-width: 100px; max-height: 100px;">
                            </center>

                        </div><br>

                    </div>
                </div>
                <br>

                <br>
            </div>
        </div>
    </div>
@endsection
