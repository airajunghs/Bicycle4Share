@extends('layouts.default')

@section('contents')
    <center>
        <p class="title">Welcome {{ Auth::user()->name }}</p>
        <div class="container px-4 text-center" id="container">
            <div class="row gx-2">
                <div class="col-3">
                    <div class="totalCandidate">
                        <div class="tutorial">
                            <p id="totalCandidate"><br>Image</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="totalCandidate">
                        <div class="tutorial">
                            <p id="totalCandidate"><br>Image</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="totalCandidate">
                        <div class="tutorial">
                            <p id="totalCandidate"><br>Image</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
@endsection
