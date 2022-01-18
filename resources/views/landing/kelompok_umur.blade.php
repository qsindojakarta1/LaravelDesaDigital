@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="site-tile text-center mb-60">
                        <span class="sub-title">Grafik Umur</span>
                        <h2 class="mb-0">Grafik Pertumbuhan Penduduk {{ getDesaFromUrl()->nama_desa }} Berdasarkan Umur</h2>
                    </div>
                    <div class="">
                        <canvas id="chartBar1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{ $desa->id }}" id="desa_id">
@stop
@push('landing.head')
<style>
    #chartBar1 {
        width: 100%;
        height: 300px;
    }
</style>
@endpush
@push('landing.script')

<!--Chart bundle min js -->
<script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<script>
    const getUmur = async () => {
        let piedata = await fetch(`/api/umur`, {
            method: 'post',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({
                auth: $('#auth').val(),
                desa_id: $('#desa_id').val()
            })
        }).then(data => data.json())
        var ctx1 = document.getElementById('chartBar1').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: piedata.label,
                datasets: [{
                    label: '# of Votes',
                    data: piedata.data,
                    backgroundColor: '#00cccc'
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 10,
                            max: 15
                        }
                    }],
                    xAxes: [{
                        barPercentage: 0.6,
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        });
    }
    getUmur()
</script>
@endpush