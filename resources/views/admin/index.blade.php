@extends('layouts.admin')


@section('content')

    <div class="row">
        <div class="col-sm-4">
            <h1>Admin</h1>
        </div>
        <div class="col-sm-8">
            {!! Form::open(['route' =>'admin.index', 'method'=> 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}

            <div class="form-group">
                {!! Form::label('responsable', 'Responsable:') !!}
                {!! Form::select('responsable', [''=>'Todos'] + $responsables, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Buscar</button>
            </div>
            <i class="fa fa-filter" aria-hidden="true" id="filter"></i>
            {!! Form::close() !!}
        </div>
    </div>

    <canvas id="myChart"></canvas>

    <hr>

@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pendientes', 'Proceso', 'Finalizadas', 'Correciones'],
                datasets: [{
                    label: 'Informacion',
                    data: [{{$pendientes}}, {{$proceso}}, {{$finalizadas}}, {{$correcciones}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            if (window.location.href.indexOf("?") > -1) {
                $('#filter').attr('class', 'fa fa-filter');
                $("#filter").click(function () {
                    window.location.href = "{{URL::to('admin/')}}"
                });
                document.getElementById('responsable').value= '{{$responsable}}';

            }else{
                $('#filter').attr('class', '');
            }
        });
    </script>
@endsection
