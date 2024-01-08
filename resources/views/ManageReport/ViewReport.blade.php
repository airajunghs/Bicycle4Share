<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

@extends('layouts.default')

@section('contents')
    <style>
        table.table th {
            border: none;
        }


        .container-fluid {
            padding-left: 0;
            padding-right: 70%;
        }

        .col-8 {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

            </div>
            <div class="col-8 px-1 text-center" id="container">
                <table class="table">
                    <tr>
                        <th colspan="3" class="text-right">
                            <select style="background-color:rgba(138, 164, 255, 0.39)" id="selectChart"
                                onchange="selectOnChange()">
                                @if (Request::get('type') == 'yearly')
                                    <option value="yearly" selected>Yearly</option>
                                @else
                                    <option value="yearly">Yearly</option>
                                @endif

                                @if (Request::get('type') == 'monthly')
                                    <option value="monthly" selected>Monthly</option>
                                @else
                                    <option value="monthly">Monthly</option>
                                @endif

                                @if (Request::get('type') == 'weekly')
                                    <option value="weekly" selected>Weekly</option>
                                @else
                                    <option value="weekly">Weekly</option>
                                @endif


                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="reportSmallBackground">
                                <div class="tutorial">
                                    <p id="totalCandidate">TOTAL BICYCLE</p>
                                    <p style="font-size: 50; float: right;">{{ $totalBicycles }}</p>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="reportSmallBackground" style="background-color: #99D8FF">
                                <div class="tutorial">
                                    <p id="totalCandidate">TOTAL STUDENT</p>
                                    <p style="font-size: 50; float: right;">{{ $totalStudents }}</p>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="reportSmallBackground">
                                <div class="tutorial">
                                    <p id="totalCandidate">TOTAL PENALTY</p>
                                    <p style="font-size: 50; float: right;">RM {{ $totalPenalties }}</p>
                                </div>
                            </div>
                        </th>
                    </tr>

                    <tr>
                        <th colspan="2" rowspan="2" style="margin-right: 5%">
                            <div class="col">
                                <div class="complaintBackground">
                                    <div class="tutorial">
                                        <div class="d-flex justify-content-between">
                                            <p id="totalCandidate">TOTAL COMPLAINT</p>
                                            <div class="d-flex" style="gap:5px">
                                                @if (Request::get('type') == 'monthly' || Request::get('type') == 'weekly')
                                                    <button class="px-2" onclick="chartYear('2023')"
                                                        @if (Request::get('year') == '2023') style='background-color:rgba(138, 164, 255, 0.39);' @endif>2023</button>
                                                    <button class="px-2" onclick="chartYear('2024')"
                                                        @if (Request::get('year') == '2024') style='background-color:rgba(138, 164, 255, 0.39);' @endif>2024</button>
                                                @endif
                                            </div>
                                        </div>

                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </th>

                        <th>
                            <div class="reportSmallBackground" style="background-color: #99D8FF">
                                <div class="tutorial">
                                    <p id="totalCandidate">TOTAL COMPLAINT</p>
                                    <p style="font-size: 50; float: right;">{{ $totalComplaints }}</p>
                                </div>
                            </div>
                        </th>
                    </tr>

                    <tr>
                        {{-- <td colspan="2">
                            <!-- Add content here if needed -->
                        </td> --}}

                        <th>
                            <div class="reportSmallBackground">
                                <div class="tutorial">
                                    <p id="totalCandidate">TOTAL BICYCLE AVAILABLE</p>
                                    <p style="font-size: 50; float: right;">{{ $totalBikeAvailable }}</p>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart');
        const selectchart = $('#selectChart');
        const dataJson = {!! json_encode($dataArr) !!};

        const data = [];
        const labels = [];


        for (var key in dataJson) {
            if (selectchart.val() == 'monthly') {
                var count = dataJson[key].count;
                var month = dataJson[key].month;
                data.push(count);
                labels.push(month);
            } else if (selectchart.val() == 'yearly') {
                var count = dataJson[key].count;
                var year = dataJson[key].year;
                data.push(count);
                labels.push(year);
            } else if (selectchart.val() == 'weekly') {
                var count = dataJson[key].count;
                var week = dataJson[key].week;
                data.push(count);
                labels.push(week);
            }

        }

        const dataSet = {
            labels: labels,
            datasets: [{
                label: 'Complaint',
                data: data,
            }]
        };

        new Chart(ctx, {
            type: 'bar',
            data: dataSet,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        })

        function selectOnChange() {
            const selectchart = $('#selectChart');
            window.location.href = "/manageReport?type=" + selectchart.val();

        }

        function chartYear(year) {
            const selectchart = $('#selectChart');
            window.location.href = "/manageReport?type=" + selectchart.val() + '&year=' + year;
        }
    </script>
@endsection
