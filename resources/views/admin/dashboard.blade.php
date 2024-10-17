@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <h3 class="page-title">
            Dashboard
        </h3>
    </div>

    <div class="row grid-margin">
        <div class="col-12">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="statistics-item">
                            <p>
                                <i class="icon-sm fa fa-user mr-2"></i>
                                users
                            </p>
                            <h2>{{ $users }}</h2>
                            <label class="badge badge-outline-success badge-pill">Updated</label>
                        </div>
                        <div class="statistics-item">
                            <p>
                                <i class="icon-sm fas fa-check-circle mr-2"></i>
                                Categories
                            </p>
                            <h2>{{ $categories }}</h2>
                            <label class="badge badge-outline-success badge-pill">Updated</label>
                        </div>
                        <div class="statistics-item">
                            <p>
                                <i class="icon-sm fas fa-check-circle mr-2"></i>
                                Products
                            </p>
                            <h2>{{ $products }}</h2>
                            <label class="badge badge-outline-success badge-pill">Updated</label>
                        </div>
                        <div class="statistics-item">
                            <p>
                                <i class="icon-sm fas fa-chart-line mr-2"></i>
                                Orders
                            </p>
                            <h2>{{ $noTcompletedOrders }}</h2>
                            <label class="badge badge-outline-success badge-pill">Updated</label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
