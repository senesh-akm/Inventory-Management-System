@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <style>
        .icon-background {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 50%;
        }
        /* Ensure cards have consistent padding on mobile */
        .card-body {
            padding: 15px;
        }
    </style>
@endpush

@section('content')
    <main class="mt-4">
        <div class="container">
            <h1>Dashboard</h1>
            <div class="mt-3">
                <div class="row">
                    <!-- Sales Orders Card -->
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <div class="card h-100">
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
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <div class="card h-100">
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
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <div class="card h-100">
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
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <div class="card h-100">
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
            </div>
        </div>
    </main>
@endsection
