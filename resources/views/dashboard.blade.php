@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                        <span class="info-box-number">{{ $totales['clients'] }}</span>
                    </h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="clientes" class="small-box-footer">
                    Ver <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            {{-- <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div> --}}
        </div>
        <div class="col-md-3 col-sm-6 col-12">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>
                        <span class="info-box-number">{{ $totales['products'] }}</span>
                    </h3>
                    <p>Productos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-list"></i>
                </div>
                <a href="productos" class="small-box-footer">
                    Ver <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>
                        <span class="info-box-number">{{ $totales['categories'] }}</span>
                    </h3>
                    <p>Categorias</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="categorias" class="small-box-footer">
                    Ver <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>
                        <span class="info-box-number">{{ $totales['sales'] }}</span>
                    </h3>
                    <p>Ventas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cash-register"></i>
                </div>
                <a href="venta/show" class="small-box-footer">
                    Ver <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>


    {{--    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div> --}}

    <!-- /.card -->
    <div class="row">
        {{-- <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">VENTAS POR SEMANA</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="ventasPorSemana" width="804" height="375" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>

            </div>

        </div> --}}

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">VENTAS POR MES</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-shrink">
                                
                                    <canvas id="venta" width="804" height="375" class="chartjs-render-monitor"></canvas>
                                
                            </div>
                        </div>
                        
                </div>

            </div>

        </div>

    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css')}}">
    
    
@stop

@section('js')
    <script>
        var botmanWidget = {  
        
            introMessage: "¡Bienvenido a SYSTEM V! ¿Cómo puedo ayudarte hoy?",
            title: "Asistente Virtual", // Título del widget
            headerTextColor: "#ffffff", // Color del texto del encabezado
            headerBackgroundColor: "#007bff", // Color de fondo del encabezado
            placeholderText: "Puedes iniciar la conversación con un Hola",
            bubbleAvatarUrl: "images/chatbot.png",

           
            mobileHeight: '100%', // Altura completa en móvil
            mobileWidth: '100%' // Ancho completo en móvil
          
                
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //ventas
        var dataVenta = @json($venta);
        if (dataVenta && Object.keys(dataVenta).length > 0) {
            var ctx = document.getElementById('ventasPorMes').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(dataVenta[Object.keys(dataVenta)[0]]),
                    datasets: Object.keys(dataVenta).map(function(year) {
                        return {
                            label: year,
                            data: Object.values(dataVenta[year]),
                            backgroundColor: 'rgb(75, 192, 192)',
                            borderWidth: 1
                        };
                    })
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

       
    </script>
@stop
