@extends('frontend.master');
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Shipping address</h3>
                        </div>
                        <form action="{{route('save_shipping')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="Full Name"/>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address"/>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City"/>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country"/>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip_code" placeholder="ZIP Code"/>
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="mobile" placeholder="Mobile"/>
                            </div>
                            <input type="submit" class="primary-btn order-submit" style="float: right;" value="Next"/>
                        </form>
                    </div>
                    <!-- /Billing Details -->
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
