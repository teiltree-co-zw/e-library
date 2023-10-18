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
                                    <h2 class="mb-4 text-dark font-weight-bold">{{ $teachers }}</h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="mb-2 text-dark font-weight-normal">Students</h5>
                                    <h2 class="mb-4 text-dark font-weight-bold">{{ $students }}</h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="mb-2 text-dark font-weight-normal">All Classes</h5>
                                    <h2 class="mb-4 text-dark font-weight-bold">{{ $classes }}</h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="mb-2 text-dark font-weight-normal">Books Uploaded</h5>
                                    <h2 class="mb-4 text-dark font-weight-bold">{{ $books }}</h2>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
