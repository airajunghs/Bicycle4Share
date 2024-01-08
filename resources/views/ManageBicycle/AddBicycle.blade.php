@extends('layouts.default')

@section('contents')
    <div class="container">
        {{-- <div class="background"> --}}
        <br>

        <form action="/manageBicycle/createBicycle" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col">
                        <div class="userinfoblue">

                            {{-- STUDENT PUNYA VIEW!! --}}
                            <div class="borderuserinfo">
                                <h1>NEW BICYCLE</h1>

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
                                            <th scope="row">BICYCLE IMAGE</th>
                                            <th scope="row">:</th>
                                            {{-- <td>{{ $users->name }}</td> --}}
                                            <td>
                                                <input type="file" name="image" id="imageInput" accept="image/*"
                                                    onchange="previewImage()" required>
                                                <center>
                                                    <img id="imagePreview" src="#" alt="Image Preview"
                                                        style="display: none; max-width: 100px; max-height: 100px;">
                                                </center>
                                            </td>
                                        </tr>

                                        <script>
                                            function previewImage() {
                                                var input = document.getElementById('imageInput');
                                                var preview = document.getElementById('imagePreview');

                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        preview.src = e.target.result;
                                                        preview.style.display = 'block';
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">BICYCLE ID</th>
                                            <th scope="row">:</th>
                                            <td><input type="text" name="bicycleID" value="{{ $newBicycleID }}" disabled
                                                class="inputLatest">
                                            </td>
                                        </tr>


                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">BICYCLE MODEL</th>
                                            <th scope="row">:</th>
                                            <td>
                                                <select id="model" name="model" class="inputLatest">
                                                    <option value="Road Bike">Road Bike</option>
                                                    <option value="Hiking Bike">Hiking Bike</option>
                                                    <option value="BMX">BMX</option>
                                                </select>
                                            </td>
                                        </tr>


                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">BICYCLE COLOR</th>
                                            <th scope="row">:</th>
                                            <td>
                                                <select id="color" name="color" class="inputLatest">
                                                    <option value="Black">Black</option>
                                                    <option value="Red">Red</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Yellow">Yellow</option>
                                                    <option value="White">White</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">BICYCLE STATUS</th>
                                            <th scope="row">:</th>
                                            <td>
                                                <select id="status" name="status" class="inputLatest"

                                                    onchange="hideDiv(this)">
                                                    <option hidden>--Select Status--
                                                    </option>
                                                    <option value="Owner">Owner</option>
                                                    <option value="Available">Available</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="userinfo2">

                            <div class="borderuserinfo2">
                                <h3>BORROWER INFORMATION</h3>

                                <script>
                                    function hideDiv(elem) {
                                        if (elem.value == "Available") {
                                            document.getElementById('hideDiv').style.display = "none";
                                        } else {
                                            document.getElementById('hideDiv').style.display = "block";
                                        }
                                    }
                                </script>

                                <table style="margin-top: 20%; border: none; width: 100%">
                                    <tbody>
                                        <tr id="hideDiv">
                                            <th scope="row">STUDENT ID</th>
                                            <th scope="row">:</th>
                                            <td>
                                                <select name="matricid" class="inputLatest">
                                                    <option value="--Select Student ID--" hidden>--Select Student ID--
                                                    </option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->idnumber }}">{{ $user->idnumber }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">BICYCLE BORROW DATE</th>
                                            <th scope="row">:</th>
                                            <td><input type="date" name="bicycleBorrowDate" value="" class="inputLatest">
                                            </td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>

                                        <tr>
                                            <th scope="row">BICYCLE RETURN DATE</th>
                                            <th scope="row">:</th>
                                            <td><input type="date" name="bicycleReturnDate" value="" class="inputLatest">
                                            </td>
                                        </tr>

                                        <td><br></td>
                                        <td><br></td>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- sebab dalam form so guna button type submit --}}
                        <div style="margin-top: 10%">
                            <button type="submit" class="custom-button px-5 py-10">SAVE</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        {{-- </div> --}}
    </div>
@endsection
