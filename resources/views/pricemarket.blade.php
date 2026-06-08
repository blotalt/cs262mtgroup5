@extends('layout')

@section('hero')
    <div class="bg-header-green text-white pb-5 pt-4">
        <div class="container mt-0">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="section-label">Live Data · Updated Today</span>
                    <h1 class="display-5 fw-bold mt-1 mb-2" style="font-family: Georgia, serif;">Market Prices</h1>
                    <p class="text-white-50 lead fs-6">Track daily Cambodian rice prices from provincial markets, farmers markets, and more...</p>
                </div>
            </div>
        </div>  
    </div>
@endsection

@section('content')
<section class="prices-section py-5">
    <div class="container">
        <h2 class="fw-bold mb-1">Latest Market Prices</h2>
        <p class="text-muted mb-4">Updated daily from 25 provincial markets</p>

        <div class="price-table-wrapper rounded-3 shadow-sm overflow-hidden">
            <table class="table table-hover price-table mb-0">
                <thead>
                    <tr>
                        <th>Rice Variety</th>
                        <th>Province</th>
                        <th>Market</th>
                        <th>Price / kg</th>
                        <th>Change</th>
                        <th>Updated</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <div class="rice-name">Phka Rumduol</div>
                            <div class="rice-type">Jasmine Rice</div>
                        </td>
                        <td>Takeo</td>
                        <td>Provincial Market</td>
                        <td class="price-value">$1.40</td>
                        <td class="price-up">+2.1%</td>
                        <td>Today</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="rice-name">Neab Dam</div>
                            <div class="rice-type">Black Rice</div>
                        </td>
                        <td>Kampong Thom</td>
                        <td>Central Market</td>
                        <td class="price-value">$1.25</td>
                        <td class="price-up">+0.8%</td>
                        <td>Today</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="rice-name">Phka Rumdeng</div>
                            <div class="rice-type">Red Rice</div>
                        </td>
                        <td>Siem Reap</td>
                        <td>Local Market</td>
                        <td class="price-value">$1.10</td>
                        <td class="price-down">-0.5%</td>
                        <td>Today</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="rice-name">Angkor Damnaeb</div>
                            <div class="rice-type">Glutinous Rice</div>
                        </td>
                        <td>Prey Veng</td>
                        <td>Provincial Market</td>
                        <td class="price-value">$1.18</td>
                        <td class="price-up">+1.2%</td>
                        <td>Today</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="rice-name">Angkor Samroub</div>
                            <div class="rice-type">Brown Rice</div>
                        </td>
                        <td>Mondulkiri</td>
                        <td>Farm Market</td>
                        <td class="price-value">$1.32</td>
                        <td class="price-up">+0.4%</td>
                        <td>Today</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection