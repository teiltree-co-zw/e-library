@extends('layouts.app')

@section('content')
    <div class="row" id="proBanner">
        <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  Welcome to E-library
                </span>
        </div>
    </div>
    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="mb-2 text-dark font-weight-normal">Teachers</h5>
                                    <h2 class="mb-4 text-dark font-weight-bold">932.00</h2>
                                    <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div>
                                    <p class="mt-4 mb-0">Completed</p>
                                    <h3 class="mb-0 font-weight-bold mt-2 text-dark">5443</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="mb-2 text-dark font-weight-normal">Students</h5>
                                    <h2 class="mb-4 text-dark font-weight-bold">756,00</h2>
                                    <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-account-circle icon-md absolute-center text-dark"></i></div>
                                    <p class="mt-4 mb-0">Increased since yesterday</p>
                                    <h3 class="mb-0 font-weight-bold mt-2 text-dark">50%</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="mb-2 text-dark font-weight-normal">Impressions</h5>
                                    <h2 class="mb-4 text-dark font-weight-bold">100,38</h2>
                                    <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-eye icon-md absolute-center text-dark"></i></div>
                                    <p class="mt-4 mb-0">Increased since yesterday</p>
                                    <h3 class="mb-0 font-weight-bold mt-2 text-dark">35%</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="mb-2 text-dark font-weight-normal">Followers</h5>
                                    <h2 class="mb-4 text-dark font-weight-bold">4250k</h2>
                                    <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-cube icon-md absolute-center text-dark"></i></div>
                                    <p class="mt-4 mb-0">Decreased since yesterday</p>
                                    <h3 class="mb-0 font-weight-bold mt-2 text-dark">25%</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
