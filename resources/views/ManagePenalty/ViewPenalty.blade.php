@extends('layouts.default')

@section('contents')
    <div class="container">
        <div class="background">

            <br>

            {{-- STUDENT DAN ADMIN GUNA INTERFACE VIEW SAMA, LETAK CONDITION UNTUK ACTION UNTUK ADMIN --}}

            <div class="container text-center">

                <div style="display: flex; align-items: center;">
                    <h1>{{ Auth::user()->type == 'student' ? 'Student' : 'Admin' }} Information</h1>

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
                    <div style="display: flex; justify-content: space-between; align-items: center; text-align: left;">
                        <h1>List of Penalty</h1>

                        {{-- search form --}}
                        <form class="form-inline my-2 my-lg-0" method="get" action="{{ url('/managePenalty/search') }}">
                            <div class="mb-3">
                                <input type="search" name="query" class="form-control" id="searchInput"
                                    placeholder="Search" style="width: 100%;">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </div>
                        </form>
                    </div><br>
                    <div class="table-responsive" style="min-height: 400px; overflow-x: ;">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>DATE</th>
                                    <th>ID</th>
                                    <th>BICYCLE ID</th>
                                    <th>COMPLAINT</th>
                                    <th>PENALTY</th>
                                    <th>STUDENT</th>
                                    <th>STATUS</th>
                                    {{-- ACTION HANYA MUNCUL UNTUK ADMIN SAHAJA --}}
                                    @if (Auth::user()->type == 'admin')
                                        <th>ACTION</th>
                                    @else
                                        <th>ACTION</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penalties as $penalty)
                                    @php
                                        $notification = \App\Models\Notification::where('StudentID', $penalty->StudentID)->first();
                                    @endphp

                                    <tr>
                                        <td>{{ $penalty->currentDate }}</td>
                                        <td>{{ $penalty->PenaltyID }}</td>
                                        <td><b>{{ $penalty->complaints->bicycleID }}</b></td>
                                        {{-- Displaying all complaints related to the current penalty --}}
                                        <td>
                                            <b>ID:{{ $penalty->complaints->complaintID }}</b><br>
                                            {{ $penalty->complaints->complaint }}
                                        </td>
                                        <td><b>RM{{ $penalty->PenaltyAmount }}</b> <br>Reason:
                                            {{ $penalty->PenaltyDescription }} </td>
                                        <td>{{ $penalty->StudentID }}</td>
                                        <td>{{ $penalty->PenaltyStatus }}</td>
                                        {{-- <td>{{ $penalty->remarks }}</td> --}}
                                        {{-- ACTION HANYA MUNCUL UNTUK ADMIN SAHAJA --}}
                                        @if (Auth::user()->type == 'admin')
                                            {{-- delete icon --}}
                                            <td><a href="/managePenalty/{{ $penalty->id }} /delete"
                                                    onclick="return confirm('Are You Sure?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg></a>

                                                {{-- message icon --}}

                                                @isset($notification)
                                                    <a href="/manageNotification/{{ $notification->id }}/edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-chat-dots-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                        </svg></a>
                                                @endisset

                                                {{-- payment icon --}}
                                                @if ($penalty->PenaltyStatus != 'Paid')
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        onclick="openPayment('{!! $penalty->PenaltyAmount !!}','{!! $penalty->PenaltyID !!}')"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-credit-card-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1" />
                                                        </svg></a>
                                                @else
                                                    <button class="btn btn-sm" style="position:unset;"
                                                        data-bs-toggle="modal" data-bs-target="#viewPaymentModal"
                                                        onclick="viewPayment('{!! $penalty->PenaltyID !!}')">view</button>
                                                @endif

                                            </td>
                                        @else
                                            <td>
                                                <a href="/manageNotification/{{ $notification->id }}/edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-chat-dots-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                                    </svg></a>

                                                @if ($penalty->PenaltyStatus != 'Paid')
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        onclick="openPayment('{!! $penalty->PenaltyAmount !!}','{!! $penalty->PenaltyID !!}')"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-credit-card-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1" />
                                                        </svg></a>
                                                @else
                                                    <button class="btn btn-sm" style="position:unset;"
                                                        data-bs-toggle="modal" data-bs-target="#viewPaymentModal"
                                                        onclick="viewPayment('{!! $penalty->PenaltyID !!}')">view</button>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>

                <br>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="" class="form-label">Penalty (RM)</label>
                        <input type="number" disabled name="penalty" value="0" class="form-control">
                        <i><small class="text-danger penalty-error"></small></i>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-lavel">Bank</label>
                        <select name="bank" class="form-select">
                            <option value="Maybank">Maybank</option>
                            <option value="RHB">RHB</option>
                            <option value="CIMB">CIMB</option>
                            <option value="BANK RAKYAT">BANK RAKYAT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Account Number</label>
                        <input type="text" name="account_number" class="form-control"
                            placeholder="Enter Bank Account Number">
                        <i><small class="text-danger account_number-error"></small></i>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Payment (RM)</label>
                        <input type="number" name="payment" class="form-control" value="0"
                            onkeyup="calculatePayment(this)">
                        <i><small class="text-danger payment-error"></small></i>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Balance (RM)</label>
                        <input type="number" name="balance" class="form-control" value="0" disabled>
                        <i><small class="text-danger balance-error"></small></i>
                    </div>
                </div>
                <div class="modal-footer" style="height: 4rem;">
                    <button type="button" class="btn btn-secondary" style="position:unset;"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" style="position:unset;" onclick="payPenalty()"
                        id="payPenalty" disabled>Pay Penalty</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewPaymentModal" tabindex="-1" aria-labelledby="viewPaymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewPaymentModalLabel">Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="" class="form-label">Penalty (RM)</label>
                        <input type="number" disabled value="0" class="form-control" id="viewPenalty">
                        <i><small class="text-danger penalty-error"></small></i>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-lavel">Bank</label>
                        <input type="text" class="form-control" disabled id="viewBank">
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Account Number</label>
                        <input type="text" class="form-control" disabled id="viewAccNo">
                        <i><small class="text-danger account_number-error"></small></i>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Payment (RM)</label>
                        <input type="number" class="form-control" disable id="viewPayment">
                        <i><small class="text-danger payment-error"></small></i>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Balance (RM)</label>
                        <input type="number" class="form-control" disabled id="viewBalance">
                        <i><small class="text-danger balance-error"></small></i>
                    </div>
                </div>
                <div class="modal-footer" style="height: 4rem;">
                    <button type="button" class="btn btn-secondary" style="position:unset;"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewPayment(PenaltyID) {
            $.ajax({
                type: 'get',
                url: '/viewPayment/' + PenaltyID,
                success: function(data) {
                    $('#viewPenalty').val(data.penalty);
                    $('#viewBank').val(data.bank);
                    $('#viewAccNo').val(data.acc_no);
                    $('#viewPayment').val(data.payment);
                    $('#viewBalance').val(data.balance);
                },
                error: function(data) {
                    alert(data);
                },
            });
        }

        function calculatePayment(element) {
            var payment = $(element).val();
            var penalty = $('input[name=penalty]').val();
            var balance = parseInt(payment) - parseInt(penalty);
            $('input[name=balance]').val(balance);
            if (balance >= 0 || penalty == 0) {
                $('#payPenalty').prop('disabled', false);
            } else {
                $('#payPenalty').prop('disabled', true);
            }
        }

        function openPayment(amount, PenaltyID) {
            $('input[name=penalty]').val(amount);
            $('#payPenalty').attr('onclick', "payPenalty('" + PenaltyID + "')")
        }

        function payPenalty(PenaltyID) {
            var penalty = $('input[name=penalty]').val();
            var bank = $('select[name=bank]').val();
            var account_number = $('input[name=account_number]').val();
            var payment = $('input[name=payment]').val();
            var balance = $('input[name=balance]').val();
            var error = 0;

            console.log(account_number, payment, balance);

            if (payment == 0 || payment == null || payment == '') {
                error++;
                $('.payment-error').text('Please Enter Payment!');
            } else {
                $('.payment-error').text();
            }

            if (balance < 0 || balance == null || balance == '') {
                error++;
                $('.balance-error').text('Please Enter Payment!');
            } else {
                $('.balance-error').text();
            }

            if (penalty == 0 || penalty == null || penalty == '') {
                error++;
                $('.penalty-error').text('Error!');
            } else {
                $('.penalty-error').text();
            }

            if (account_number == 0 || account_number == null || account_number == '') {
                error++;
                $('.account_number-error').text('Please Enter Account Number!');
            } else {
                $('.account_number-error').text('');
            }

            if (error <= 0) {
                $.ajax({
                    type: 'post',
                    url: '/payment',
                    data: {
                        'penalty': penalty,
                        'acc_no': account_number,
                        'payment': payment,
                        'balance': balance,
                        'bank': bank,
                        'PenaltyID': PenaltyID,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(data) {
                        window.location.href = "/managePenalty"
                    },
                    error: function(data) {
                        alert(data);
                    },
                });
            }
        }
    </script>
@endsection
