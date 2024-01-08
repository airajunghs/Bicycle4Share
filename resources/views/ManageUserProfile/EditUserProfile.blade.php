@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">
            <br>
            <form action="/{{ $user->id }}/update" method="post">
                @csrf
                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col">
                            <div class="userinfo">

                                {{-- STUDENT PUNYA VIEW, BOLEH UPDATE PROFILE!! --}}
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
                                                <th scope="row">Matric ID</th>
                                                <th scope="row">:</th>
                                                <td><input type="text" name="idnumber" value="{{ $user->idnumber }} "
                                                        class="inputLatest">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Full Name</th>
                                                <th scope="row">:</th>
                                                <td><input type="text" name="name" value="{{ $user->name }}"
                                                        class="inputLatest"></td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>

                                            <tr>
                                                <th scope="row">Email</th>
                                                <th scope="row">:</th>
                                                <td><input type="text" name="email" value="{{ $user->email }}"
                                                        class="inputLatest"></td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>

                                            <tr>
                                                <th scope="row">Phone Number</th>
                                                <th scope="row">:</th>
                                                <td><input type="text" name="phonenum" value="{{ $user->phonenum }}"
                                                        class="inputLatest">
                                                </td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>

                                            <tr>
                                                <th scope="row">Resident</th>
                                                <th scope="row">:</th>
                                                <td><input type="text" name="resident" value="{{ $user->resident }}"
                                                        class="inputLatest">
                                                </td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>

                                            <tr>
                                                <th scope="row">Year Study</th>
                                                <th scope="row">:</th>
                                                <td><input type="text" name="year" value="{{ $user->year }}"
                                                        class="inputLatest">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br>
                        </div>
                        <div class="col">


                            <div style="margin-top: 135%">
                                <button type="submit" class="custom-button px-5 py-10">Update</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
