<div class="row text-light">
    <div class="col-md-3">
        <div class="card bg-danger">
            <div class="card-body">
                <h2 class="display-4">{{ $warga }}</h2>
                <h5>Warga</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-primary">
            <div class="card-body">
                <h2 class="display-4">{{ $aduan }}</h2>
                <h5>Aduan</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning">
            <div class="card-body">
                <h2 class="display-4">{{ $pengguna }}</h2>
                <h5>Pengguna</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success">
            <div class="card-body">
                <h2 class="display-4">{{ $produk }}</h2>
                <h5>Produk</h5>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Grafik Agama
                </div>
                <p class="mg-b-20">Grafik Pertumbuhan Penduduk Berdasarkan Agama</p>
                <div class="ht-200 ht-sm-300" id="flotPie1"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Grafik Suku
                </div>
                <p class="mg-b-20">Grafik Pertumbuhan Penduduk Berdasarkan Suku</p>
                <div class="ht-200 ht-sm-300" id="flotPie2"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Grafik Golongan Darah
                </div>
                <p class="mg-b-20">Grafik Pertumbuhan Penduduk Berdasarkan Golongan Darah</p>
                <div class="ht-200 ht-sm-300" id="flotPie3"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Grafik Status Pernikahan
                </div>
                <p class="mg-b-20">Grafik Pertumbuhan Penduduk Berdasarkan Status Pernikahan</p>
                <div class="ht-200 ht-sm-300" id="flotPie4"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Grafik Pendidikan
                </div>
                <p class="mg-b-20">Grafik Pertumbuhan Penduduk Berdasarkan Pendidikan</p>
                <div class="ht-200 ht-sm-300" id="flotPie5"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Grafik Pekerjaan
                </div>
                <p class="mg-b-20">Grafik Pertumbuhan Penduduk Berdasarkan Pekerjaan</p>
                <div class="ht-200 ht-sm-300" id="flotPie6"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Grafik Umur
                </div>
                <p class="mg-b-20">Grafik Pertumbuhan Penduduk Berdasarkan Umur</p>
                <div class="chart-container" style="height: 500px !important;">
                    <canvas width="600" height="250" id="chartBar1"></canvas>
                </div>
            </div>
        </div>
    </div><!-- col-6 -->
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Grafik Dusun
                </div>
                <p class="mg-b-20">Grafik Pertumbuhan Penduduk Berdasarkan Dusun</p>
                <div class="chart-container" style="height: 500px !important;">
                    <canvas width="600" height="250" id="chartBar2"></canvas>
                </div>
            </div>
        </div>
    </div><!-- col-6 -->
</div>
<input type="hidden" id="auth" value="{{ auth()->user()->id }}">
<input type="hidden" id="desa_id" value="{{ getDesaFromUrl()->id }}">
@push('script')
<!-- Chart flot js -->
<script src="{{ asset('assets/js/chart.flot.js') }}"></script>
<!-- Chart.bundle js -->
<script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
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
            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 2 / 3,
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
                return (`<div style="font-size:8pt; text-align:center; padding:2px; color:white;">
                        ${label}
                        <br/>
                        ${Math.round(series.percent)}%
                        </div>`);
            }
        } catch (e) {
            console.log(e)
        }
    }
    const getSuku = async () => {
        try {
            let piedata = await fetch(`/api/suku`, {
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
            $.plot('#flotPie2', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 2 / 3,
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
                return (`<div style="font-size:8pt; text-align:center; padding:2px; color:white;">
                        ${label}
                        <br/>
                        ${Math.round(series.percent)}%
                        </div>`);
            }
        } catch (e) {
            console.log(e)
        }
    }
    const getGolonganDarah = async () => {
        try {
            let piedata = await fetch(`/api/golongandarah`, {
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
            $.plot('#flotPie3', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 2 / 3,
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
                return (`<div style="font-size:8pt; text-align:center; padding:2px; color:white;">
                        ${label}
                        <br/>
                        ${Math.round(series.percent)}%
                        </div>`);
            }
        } catch (e) {
            console.log(e)
        }
    }
    const getStatusPerkawinan = async () => {
        try {
            let piedata = await fetch(`/api/statusperkawinan`, {
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
            $.plot('#flotPie4', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 2 / 3,
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
                return (`<div style="font-size:8pt; text-align:center; padding:2px; color:white;">
                        ${label}
                        <br/>
                        ${Math.round(series.percent)}%
                        </div>`);
            }
        } catch (e) {
            console.log(e)
        }
    }
    const getPendidikan = async () => {
        try {
            let piedata = await fetch(`/api/pendidikan`, {
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
            $.plot('#flotPie5', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 2 / 3,
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
                return (`<div style="font-size:8pt; text-align:center; padding:2px; color:white;">
                        ${label}
                        <br/>
                        ${Math.round(series.percent)}%
                        </div>`);
            }
        } catch (e) {
            console.log(e)
        }
    }
    const getPekerjaan = async () => {
        try {
            let piedata = await fetch(`/api/pekerjaan`, {
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
                            radius: 2 / 3,
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
                return (`<div style="font-size:8pt; text-align:center; padding:2px; color:white;">
                        ${label}
                        <br/>
                        ${Math.round(series.percent)}%
                        </div>`);
            }
        } catch (e) {
            console.log(e)
        }
    }
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
    const getDusun = async () => {
        let piedata = await fetch(`/api/dusun`, {
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
        console.log(piedata)
        var ctx1 = document.getElementById('chartBar2').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: piedata.desa,
                datasets: [{
                    label: '# of Votes',
                    data: piedata.jumlah,
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
                            max: 100
                        }
                    }],
                    xAxes: [{
                        barPercentage: 0.6,
                        ticks: {
                            beginAtZero: true,
                            fontSize: 8
                        }
                    }]
                }
            }
        });
    }
    getAgama()
    getSuku()
    getGolonganDarah()
    getStatusPerkawinan()
    getPendidikan()
    getPekerjaan()
    getDusun()
    getUmur()
</script>
@endpush