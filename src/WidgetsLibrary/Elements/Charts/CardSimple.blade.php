@php
    $chartId = str_random(10);
@endphp
<div class="card text-white bg-primary">
    <div class="card-body pb-0">
        <div class="btn-group float-right">
            <i class="{{ $class ?? 'fa fa-heart' }}" style="font-size: 3rem"></i>
        </div>
        <h4 class="mb-0">{{ $total ?? '' }}</h4>
        <p>{{ $title ?? '' }}</p>
    </div>
    <div class="chart-wrapper px-3" style="height:90px;">
        <canvas id="{{ $chartId }}" class="chart" height="90"></canvas>
    </div>
</div>

@push('scripts.additional')
<script type="text/javascript">
$(function() {
    'use strict';
    var labels = [
        @foreach($labels as $label)
            @if($loop->last)
                '{{ $label }}'
            @else
                '{{ $label }}',
            @endif
        @endforeach
    ];
    var data = {
        labels: labels,
        datasets: [{
            backgroundColor: '#f4645f',
            borderColor: 'rgba(255,255,255,.55)',
            data: [
            @foreach($values as $value)
                @if($loop->last)
                    '{{ $value }}'
                @else
                    '{{ $value }}',
                @endif
            @endforeach
            ]
        }]
    };
    var options = {
        hover: {
            onHover: function(e) {
                var point = this.getElementAtEvent(e);
                if (point.length) e.target.style.cursor = 'pointer';
                else e.target.style.cursor = 'default';
            }
        },
        tooltips : {
            enabled: true,
            displayColors: false,
            backgroundColor: 'rgba(244,100,95,0.1)'

        },
        layout: {
            padding: {
                left: 5,
                right: 5
            }
        },
        maintainAspectRatio: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    color: 'transparent',
                    zeroLineColor: 'transparent'
                },
                ticks: {
                    fontSize: 1,
                    fontColor: 'transparent',
                }
            }],
            yAxes: [{
                display: false,
                ticks: {
                    display: false,
                    min: Math.min.apply(Math, data.datasets[0].data) - 8,
                    max: Math.max.apply(Math, data.datasets[0].data) + 8,
                }
            }],
        },
        elements: {
            line: {
                borderWidth: 3
            },
            point: {
                radius: 5,
                hitRadius: 10,
                hoverRadius: 4,
            },
        }
    };
    var ctx = $('#{{ $chartId }}');
    var cardChart1 = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
});
</script>
@endpush