@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">
            <br>
            <form action="/manageUserProfile/createStudent" method="POST">
                @csrf

                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col">
                            <div class="userinfo">

                                {{-- STUDENT PUNYA VIEW!! --}}
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
                                                <th>
                                                    <div class="row mb-3">
                                                        <label for="name"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                        <div class="col-md-6">
                                                            {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> --}}
                                                            <input id="name" type="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" value="{{ old('name') }}" required
                                                                autocomplete="name" autofocus>

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                {{-- <th scope="row">Matric ID</th>
                                                <th scope="row">:</th> --}}
                                                <th>
                                                    <div class="row mb-3">
                                                        <label for="idnumber"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Matric ID') }}</label>

                                                        <div class="col-md-6">
                                                            {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> --}}
                                                            <input id="idnumber" type="idnumber"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="idnumber" value="{{ old('idnumber') }}" required
                                                                autocomplete="idnumber" autofocus>

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </th>
                                                {{-- <td>{{ $users->idnumber }}</td> --}}
                                            </tr>

                                            <tr>
                                                {{-- <th scope="row">Email</th>
                                                <th scope="row">:</th> --}}
                                                <th>
                                                    <div class="row mb-3">
                                                        <label for="email"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                        <div class="col-md-6">
                                                            {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> --}}
                                                            <input id="email" type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" required autocomplete="email">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </th>
                                                {{-- <td>{{ $users->email }}</td> --}}
                                            </tr>

                                            <tr>
                                                <th>
                                                    <div class="row mb-3">
                                                        <label for="password"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" required autocomplete="new-password">

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <div class="row mb-3">
                                                        <label for="password-confirm"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password-confirm" type="password"
                                                                class="form-control" name="password_confirmation" required
                                                                autocomplete="new-password">
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th>
                                                    <div class="row mb-3">
                                                        <label for="type"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>

                                                        <div class="col-md-6">
                                                            <select class="form-control" name="type">
                                                                <option value="">Please select</option>
                                                                <option value="staff">Staff</option>
                                                                <option value="student">Student</option>

                                                            </select>
                                                            @error('category')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror


                                                        </div>

                                                    </div>
                                                </th>
                                            </tr>

                                            <tr>
                                                <th><div>
                                                    <button type="submit" class="custom-button px-5 py-10" style="margin-left:10%; margin-top:15%">SAVE</button>
                                                </div></th>
                                            </tr>


                                        </tbody>
                                    </table>


                                </div>


                            </div><br>


                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
