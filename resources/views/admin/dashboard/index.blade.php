@extends('admin.layout.app')
@section('title')
    {{ 'Dashboard | Veuz' }}
@endsection
@section('css')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .title {
            font-size: 1rem
        }

        .icon i {
            font-size: 1.8rem;
        }

        .count h4 {
            font-size: 1.5rem;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @include('admin.dashboard.list')
        </div>

        {{-- <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium title">Visitors</p>
                                </div>
                                <div class="flex-shrink-0 align-self-center icon">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('dashboard', ['filter' => 'day']) }}"
                                            class="btn {{ $filterType == 'day' ? 'btn-primary' : 'btn-secondary' }}">Day</a>
                                        <a href="{{ route('dashboard', ['filter' => 'week']) }}"
                                            class="btn {{ $filterType == 'week' ? 'btn-primary' : 'btn-secondary' }}">Week</a>
                                        <a href="{{ route('dashboard', ['filter' => 'month']) }}"
                                            class="btn {{ $filterType == 'month' ? 'btn-primary' : 'btn-secondary' }}">Month</a>
                                        <a href="{{ route('dashboard', ['filter' => 'year']) }}"
                                            class="btn {{ $filterType == 'year' ? 'btn-primary' : 'btn-secondary' }}">Year</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top py-3 count">
                            <!-- Chart -->
                            <canvas id="visitorsChart"></canvas>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
        </div> --}}

    </div>
@endsection

