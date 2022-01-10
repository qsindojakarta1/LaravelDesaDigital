@extends('layouts.landing', ['title' => $desa->nama_desa])

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="site-tile text-center mb-60">
                        <span class="sub-title">Grafik Agama</span>
                        <h2 class="mb-0">Grafik Pertumbuhan Penduduk {{ getDesaFromUrl()->nama_desa }} Berdasarkan Agama</h2>
                    </div>
                    <div class="ht-200 ht-sm-300" id="flotPie6"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{ $desa->id }}" id="desa_id">
@stop
@push('landing.head')
<style>
    #flotPie6 {
        width: 100%;
        height: 400px;
    }
</style>
@endpush
@push('landing.script')

<!-- Flot js -->
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/js/chart.flot.sampledata.js') }}"></script>
<script>
    const getAgama = async () => {
        try {
            let piedata = await fetch(`/api/agama`, {
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
            $.plot('#flotPie6', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 1 / 3,
                            formatter: labelFormatter,
                            threshold: 0.1
                        }
                    }
                },
                grid: {
                    hoverable: false,
                    clickable: true
                }
            });

            function labelFormatter(label, series) {
                return (`<div style="font-size:12pt; text-align:center; padding:2px; color:white;">
                        ${label}
                        <br/>
                        ${Math.round(series.percent)}%
                        </div>`);
            }
        } catch (e) {
            console.log(e)
        }
    }
    getAgama()
</script>
@endpush