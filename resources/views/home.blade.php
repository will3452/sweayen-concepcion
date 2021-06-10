@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <p>
        Welcome to the Dashboard, Here you can see the graph, and summary of the records.
    </p>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-chart-bar"></i> Record Summary and Report
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    Gender Chart
                    <canvas id="gender_report" width="100" height="100"></canvas>
                </div>
                <div class="col-md-3">
                    4P's Benificiacy Chart
                    <canvas id="fourp" width="100" height="100"></canvas>
                </div>
                <div class="col-md-3">
                    PhilHealth Member Chart
                    <canvas id="ph_report" width="100" height="100"></canvas>
                </div>
                <div class="col-md-3">
                    Ages Chart
                    <canvas id="ages_report" width="100" height="100"></canvas>
                </div>
                <div class="col-md-3">
                    ECCD F1K chart
                    <canvas id="eccdf1k_report" width="100" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
    $(function(){
        function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++ ) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        let gender_report_data = {
            datasets: [{
                data: [{{ $genders['male'] }}, {{ $genders['female'] }}],
            backgroundColor: ['blue','pink']
            }],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Male','Female'
            ]
        };

        var gender_report = document.getElementById('gender_report').getContext('2d');
        var myPieChart = new Chart(gender_report, {
            type: 'pie',
            data: gender_report_data
        });

        let fourp_data = {
            datasets: [{
                data: [{{ $fourpeaces['yes'] }}, {{ $fourpeaces['no'] }}],
            backgroundColor: ['yellow','red']
            }],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Yes','No'
            ]
        };
        var fourp = document.getElementById('fourp').getContext('2d');
        var myPieChart = new Chart(fourp, {
            type: 'pie',
            data: fourp_data
        });


        let ph_report_data = {
            datasets: [{
                data: [{{ $phmembers['yes'] }}, {{ $phmembers['no'] }}],
            backgroundColor: ['green','gray']
            }],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Yes','No'
            ]
        };

        var ph_report = document.getElementById('ph_report').getContext('2d');
        var myPieChart = new Chart(ph_report, {
            type: 'pie',
            data: ph_report_data
        });

        let ages_report_data = {
            datasets: [{
                data: [
                    @foreach($ages as $key=>$age)
                    {{ $age}},
                    @endforeach
                ],
                backgroundColor:[
                    @foreach($ages as $age)
                        getRandomColor(),
                    @endforeach
                ]
           
            }],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                @foreach($ages as $key=>$age)
                    {{ $key}},
                    @endforeach
            ]
        };

        var ph_report = document.getElementById('ages_report').getContext('2d');
        var myPieChart = new Chart(ph_report, {
            type: 'polarArea',
            data: ages_report_data
        });
        

        // eccd f1k report
        let eccd_f1k_data = {
            datasets: [{
                data: [{{ $eccdf1k['eccdf1k'] }}, {{ $eccdf1k['master'] }}],
            backgroundColor: ['green','gray']
            }],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'ECCD F1K','NOT ECCD F1K'
            ]
        };

        var eccdf1k_report = document.getElementById('eccdf1k_report').getContext('2d');
        var eccdf1k_chart = new Chart(eccdf1k_report, {
            type: 'pie',
            data: eccd_f1k_data
        });
    })
    </script>
@endsection