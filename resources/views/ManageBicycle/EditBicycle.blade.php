@extends('layouts.default')

@section('contents')

    <head>
        <script>
            function hideDiv(elem) {
                if (elem.value == "Available") {
                    document.getElementById('hideDiv').style.display = "none";
                } else {
                    document.getElementById('hideDiv').style.display = "table-row";
                }
            }
        </script>
    </head>
    <div class="container">
        <div class="background">
            <br>

            <form action="/manageBicycle/{{ $bicycle->id }}/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col">
                            <div class="userinfo">

                                {{-- STUDENT PUNYA VIEW!! --}}
                                <div class="borderuserinfo">
                                    <h1>NEW BICYCLE</h1>
                                    <table style="margin-top: 3%; border: none; width: 100%">
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
                                                <td>
                                                    @if (isset($bicycle->bicycleImage))
                                                        <img src="/images/bicycleImages/{{$bicycle->bicycleImage}}" width="250px" height="250px" id="img">
                                                    @else
                                                        <img src="{{asset('images\no-image.jpg')}}" width="250px" height="250px" id="img">
                                                    @endif
                                                    <input type="file"  accept="image/" id="upload" name="bicycleImage">
                                                </td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>

                                            <tr>
                                                <th scope="row">BICYCLE ID</th>
                                                <th scope="row">:</th>
                                                <td><input type="text" name="bicycleID" value="{{ $bicycle->bicycleID }}" class="inputLatest" disabled></td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>

                                            <tr>
                                                <th scope="row">BICYCLE MODEL</th>
                                                <th scope="row">:</th>
                                                <td>
                                                    <select id="model" name="model" class="inputLatest">
                                                        <option value="Road Bike" @if ($bicycle->model == 'Road Bike') selected @endif>Road Bike</option>
                                                        <option value="Hiking Bike" @if ($bicycle->model == 'Hiking Bike') selected @endif>Hiking Bike</option>
                                                        <option value="BMX" @if ($bicycle->model == 'BMX') selected @endif>BMX</option>
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
                                                        <option value="Black"  @if ($bicycle->color == 'Black') selected @endif>Black</option>
                                                        <option value="Red" @if ($bicycle->color == 'Red') selected @endif>Red</option>
                                                        <option value="Green" @if ($bicycle->color == 'Green') selected @endif>Green</option>
                                                        <option value="Yellow" @if ($bicycle->color == 'Yellow') selected @endif>Yellow</option>
                                                        <option value="White" @if ($bicycle->color == 'White') selected @endif>White</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>

                                            <tr>
                                                <th scope="row">BICYCLE STATUS</th>
                                                <th scope="row">:</th>
                                                <td>
                                                    <select id="status" name="status" onchange="hideDiv(this)" class="inputLatest">
                                                        <option  hidden @if ($bicycle->status == '--Select Status--') selected @endif >--Select Status--</option>
                                                        <option value="Owner" @if ($bicycle->status == 'Owner') selected @endif>Owner</option>
                                                        <option value="Available"  @if ($bicycle->status == 'Available') selected @endif>Available</option>
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

                                    <table style="margin-top: 20%; border: none; width: 100%">
                                        <tbody>
                                            <tr id="hideDiv">
                                                <th scope="row">Student ID</th>
                                                <th scope="row">:</th>
                                                <td>
                                                    <select id="status" name="matricid" class="inputLatest">
                                                        <option  hidden>--Select Student--</option>
                                                        @foreach ($users as $user)
                                                                <option value="{{ $user->idnumber }}" @if ($bicycle->matricid == $user->idnumber ) selected @endif> {{ $user->idnumber }} </option>
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
                                                <td><input type="date" name="bicycleBorrowDate"
                                                        value="{{ $bicycle->bicycleBorrowDate }}" class="inputLatest"></td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>

                                            <tr>
                                                <th scope="row">BICYCLE RETURN DATE</th>
                                                <th scope="row">:</th>
                                                <td><input type="date" name="bicycleReturnDate"
                                                        value="{{ $bicycle->bicycleReturnDate }}" class="inputLatest"></td>
                                            </tr>

                                            <td><br></td>
                                            <td><br></td>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- sebab dalam form so guna button type submit --}}
                            <div style="margin-top: 10%">
                                <button class="custom-button px-5 py-10" type="submit">UPDATE</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#upload').change(function(){
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
            else
            {
                $('#img').attr('src', '/images/no-image.jpg');
            }
        });
    </script>
@endsection
