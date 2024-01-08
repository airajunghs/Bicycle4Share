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

                <form action="/manageComplaint/{{$complaints->id}}/update" method="POST">
                    @csrf


                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="row">DATE</th>
                                <th scope="row">:</th>
                                <td>
                                    <option value="{{ $complaints->currentDate }}">{{ $complaints->currentDate }}
                                    </option>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">CURRENT TIME</th>
                                <th scope="row">:</th>
                                <td>
                                    <option value="{{ $complaints->currentTime }}">{{ $complaints->currentTime }}
                                    </option>

                                </td>
                            </tr>

                            <tr>
                                <th scope="row">BICYCLE ID</th>
                                <th scope="row">:</th>
                                {{-- sebab complaintcontroller, bicycle panggil all(), so guna foreach untuk looping --}}
                                <td>
                                    <p>{{ $complaints->bicycleID }}</p>
                                </td>

                            </tr>

                            <tr>
                                <th scope="row">PHONE NUMBER</th>
                                <th scope="row">:</th>
                                {{-- in complaintcontroller, complaint panggil by $id, so guna $complaint terus --}}
                                <td>
                                    <option value="{{ $complaints->phoneNum }}">{{ $complaints->phoneNum }}
                                    </option>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">COMPLAINT</th>
                                <th scope="row">:</th>
                                <td>
                                    <option value="{{ $complaints->complaint }}">{{ $complaints->complaint }}
                                    </option>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">STATUS</th>
                                <th scope="row">:</th>
                                <th>
                                    <div class="col-md-6" >
                                        <select class="form-control" name="status" >
                                            {{-- <option value="">Please select</option> --}}
                                            <option value="{{ $complaints->status }}">{{ $complaints->status }}</option>
                                            <option value="status">Done</option>

                                        </select>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </th>
                            </tr>


                            <tr>
                                <th scope="row">REMARKS</th>
                                <th scope="row">:</th>
                                <td>
                                    {{-- kena ada name dan id untuk masukkan dalam database --}}
                                    <textarea name="remarks"
                                        style="width: 350px; height: 150px; padding: 50px; border: 2px solid #3498db; border-radius: 8px; font-size: 16px; resize: none;"
                                        placeholder="Type remarks"></textarea>
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
