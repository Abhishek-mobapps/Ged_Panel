@extends('admin.auth.dashboard')

@section('content')

<style>
    .page-wrapper {
        margin-left: 250px; /* Account for fixed sidebar width */
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
            
            <div class="col">
                <div class="card h-100 radius-10 bg-gradient-cosmic">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-white">Total Orders</p>
                                <h4 class="my-1 text-white">4805</h4>
                                <p class="mb-0 font-13 text-white">+2.5% from last week</p>
                            </div>
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 radius-10 bg-gradient-ibiza">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-white">Total Revenue</p>
                                <h4 class="my-1 text-white">$84,245</h4>
                                <p class="mb-0 font-13 text-white">+5.4% from last week</p>
                            </div>
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-white">Bounce Rate</p>
                                <h4 class="my-1 text-white">34.6%</h4>
                                <p class="mb-0 font-13 text-white">-4.5% from last week</p>
                            </div>
                            <div id="chart3"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 radius-10 bg-gradient-kyoto">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-dark">Total Customers</p>
                                <h4 class="my-1 text-dark">8.4K</h4>
                                <p class="mb-0 font-13 text-dark">+8.4% from last week</p>
                            </div>
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--end row-->
    </div>
</div>

@endsection
