@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <main class="mt-4">
        <div class="container">
            <h1>Dashboard</h1>
            <div class="mt-3">
                <div class="row">
                    <!-- Sales Orders Card -->
                    <div class="col-12 col-sm-6 col-md-3 mb-3">
                        <div class="card h-100">
                            <div class="card-body d-flex">
                                <div class="margin-right icon-background">
                                    <i class="bi bi-wallet-fill icon-large"></i>
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
                            <div class="card-body d-flex">
                                <div class="margin-right icon-background">
                                    <i class="bi bi-cart4 icon-large"></i>
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
                            <div class="card-body d-flex">
                                <div class="margin-right icon-background">
                                    <i class="bi bi-box-seam icon-large"></i>
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
                            <div class="card-body d-flex">
                                <div class="margin-right icon-background">
                                    <i class="bi bi-bag-check icon-large"></i>
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
