@extends('layouts.default')

@section('contents')
    <div class="container">
        {{-- <div class="background"> --}}

        <form action="/manageNotification/createNotification" method="POST">
            @csrf
            <div class="container text-center">
                <div class="row align-items-start">

                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="notifinfo" style="margin-top: 5%">

                            {{-- STUDENT PUNYA VIEW!! --}}
                            <div class="bordernotifinfo">
                                <h1>NEW NOTIFICATION</h1>

                                <table style="margin-top: 10%; border: none; width: 100%">
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
                                            <th scope="row">DATE</th>
                                            <th scope="row">:</th>
                                            <td>{{ $currentDate }}&nbsp;&nbsp;&nbsp;{{ $currentTime }}</td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">RECEIVER ID</th>
                                            <th scope="row">:</th>
                                            <td><select name="StudentID">
                                                    <option value="--Select Student ID--" hidden>--Select Student ID--
                                                    </option>
                                                    @foreach ($users as $user)
                                                        @if ($user->type == 'student')
                                                            <option value="{{ $user->idnumber }}">{{ $user->idnumber }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                            </td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">MESSAGE</th>
                                            <th scope="row">:</th>
                                            <td>
                                                <label for="NotifMessage"></label>
                                                <br>
                                                <textarea id="NotifMessage" name="NotifMessage" rows="4" cols="50"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="margin-top: 10%">
                                    <button type="submit" class="custom-button px-5 py-10">SAVE</button>
                                </div>
                            </div>
                        </div>



                    </div>


                </div>
            </div>
        </form>


    </div>
@endsection
