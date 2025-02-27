@extends('layout.main')

@section('css')

@section('title', 'Dashboard')

<link href="{{ asset('assets/css/app.min.css') }}" id="app-stylesheet" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">


<style>
    .card {
        background-color: #191C24 !important;
    }
    .header-title {
        font-size: 1rem;
        margin: 0 0 7px 0;
    }
    .card-box {
        background-color: #191C24;
        padding: 1.5rem;
        -webkit-box-shadow: 0 0.75rem 6rem rgba(56,65,74,.03);
        box-shadow: 0 0.75rem 6rem rgba(56,65,74,.03);
        margin-bottom: 24px;
        border-radius: 0.25rem;
    }
    .font-weight-normal {
        font-weight: 400!important;
    }
    .pt-2, .py-2 {
        padding-top: 0.75rem!important;
    }

    .mb-1, .my-1 {
        margin-bottom: 0.375rem!important;
    }
    @media (min-width: 1200px) {
        .col-xl-3 {
            flex: 0 0 auto;
            width: 31% !important;
        }
    }
</style>
@endsection

@section('content')
    {{-- <div class="container-fluid pt-4 px-4">
        <div class="bg-white shadow-lg text-center rounded p-4">
            <div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <canvas id="myPieChart" style="" width="400" height="400"></canvas>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div> --}}

    @php
        $tahun = date('Y'); 
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = \App\Helpers\Helper::jumlahSurat($i, $tahun);
        }
    @endphp

    <div class="container-fluid pt-4 px-4 row ms-xl-2 ms-1">
        <div class="bg-white shadow-lg text-center rounded p-4 col-xl-8">
            <div class="d-flex mb-3">
                <h4 class="col-md-11">Grafik Jumlah Surat Pertahun</h4>
                <select id="tahun" onchange="loadChart()" class="rounded">
                    @for ($i = 2023; $i <= date('Y'); $i++)
                        <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <canvas id="lineChart"></canvas>
        </div>
        <div class="bg-white shadow-lg text-center rounded p-4 col-xl-3 mt-3 mt-xl-0 ms-xl-3">
            <div class="d-flex mb-3">
                <h4 class="col-md-11 text-center" style="margin-bottom: -30px">Grafik Jumlah Surat Perbidang</h4>
                {{-- <select id="tahun" onchange="loadChart()" class="rounded">
                    @for ($i = 2023; $i <= date('Y'); $i++)
                        <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select> --}}
            </div>
            <canvas id="myPieChart" style="width: 900px; height: 400px;"></canvas>
        </div>
    </div>

    @if(session()->has('loginSuccess'))
        <script src="{{ asset('js/iziToast.min.js') }}"></script>
        <script>
            iziToast.show({
                title: 'Login Berhasil',
                message: "Selamat Datang Kembali {{ auth()->user()->name }}",
                position: 'topRight',
                color: 'green',
            });
        </script>
    @endif

@endsection



@section('js')
 <!-- Vendor js -->
 <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

 <!-- knob plugin -->
 <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

 <!--Morris Chart-->
 <script src="{{ asset('assets/libs/morris-js/morris.min.js')}}"></script>
 <script src="{{ asset('assets/libs/raphael/raphael.min.js')}}"></script>

 <!-- Dashboard init js-->
 <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>

 <!-- App js -->
<script src="{{ asset('assets/js/app.min.js')}}"></script>

<script src="{{ asset('js/iziToast.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var cty = document.getElementById('myPieChart').getContext('2d');

    const chart2 = @json($bidang);

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function generateRandomColors(count) {
        var colors = [];
        for (var i = 0; i < count; i++) {
            colors.push(getRandomColor());
        }
        return colors;
    }

    var seriesCount = chart2.length;

    var randomColors = generateRandomColors(seriesCount);

    const labelNames = chart2.map(item => item.name);

    const count = chart2.map((item, index) => chart2[index].surat.length);

    const data2 = {
        labels:labelNames,
        datasets: [{
            data: count,
            backgroundColor: randomColors,
            borderColor: randomColors,
            borderWidth: 1
        }]
    };

    var data = {
        labels: labelNames,
        datasets: [{
            label: 'Jumlah Surat',
            data: count,
            backgroundColor: randomColors,
            hoverOffset: 4,
        }]
    };

    // Konfigurasi chart
    var options = {
        responsive: true,
        aspectRatio: window.innerWidth > 976 ? 1 : 1.8,
        plugins: {
            legend: {
                display: false,
            },
            title: {
                display: true,
                font: {
                    size: 20,
                    weight: 'bold'
                }
            }
        }
    };


    var myPieChart = new Chart(cty, {
        type: 'pie',
        data: data,
        options: options
    });

    // -----------------------------------------------bar chart -----------------------------------------------

    function loadChart() {
        let selectedYear = document.getElementById('tahun').value;

        fetch(`{{ url('/grafik') }}?tahun=${selectedYear}`)
            .then(response => response.json())
            .then(data => {
                chart.data.datasets[0].data = data;
                chart.update();
            });
    }

    const ctx = document.getElementById('lineChart');
    let chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Surat',
                data: @json($data),
                borderWidth: 2,
                borderColor: 'rgb(93, 226, 60)',
                backgroundColor: '#39ff14',
                hoverBackgroundColor: '#32DE11',
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

</script>

@endsection

