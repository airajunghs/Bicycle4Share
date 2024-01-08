@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">

            <br>

            {{-- STUDENT DAN ADMIN GUNA INTERFACE VIEW SAMA, LETAK CONDITION UNTUK ACTION UNTUK ADMIN --}}

            <div class="container text-center">
                <div class="container text-center">
                    <div style="text-align: left;">
                        <h1>List of Payment/Receipt</h1>
                    </div>

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>DATE</th>
                                <th>ID</th>
                                <th>COMPLAINT</th>
                                <th>PENALTY</th>
                                <th>STATUS</th>
                                {{-- ACTION HANYA MUNCUL UNTUK ADMIN SAHAJA --}}
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <br>

                <br>
            </div>
        </div>
    </div>
@endsection
