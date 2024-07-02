@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <style>
        .icon-background {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 50%;
        }
    </style>
@endpush

@section('content')
    <main class="mt-4">
        <div class="container-fluid">
            <h1>Dashboard</h1>
            <div class="mt-3">
                <div class="row">
                    <!-- Sales Orders Card -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="mr-3 icon-background">
                                    <i class="fas fa-shopping-cart fa-2x"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="card-title">Sales Orders</h5>
                                    <h3 class="card-text">10</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Purchase Orders Card -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="mr-3 icon-background">
                                    <i class="fas fa-truck fa-2x"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="card-title">Purchase Orders</h5>
                                    <h3 class="card-text">3</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Available Items Card -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="mr-3 icon-background">
                                    <i class="fas fa-boxes fa-2x"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="card-title">Available Items</h5>
                                    <h3 class="card-text">143</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sold Items Card -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="mr-3 icon-background">
                                    <i class="fas fa-dollar-sign fa-2x"></i>
                                </div>
                                <div class="ml-3">
                                    <h5 class="card-title">Sold Items</h5>
                                    <h3 class="card-text">201</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var ctx = document.getElementById('salesChart').getContext('2d');
                var chartData = @json($data);

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: chartData,
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                beginAtZero: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
