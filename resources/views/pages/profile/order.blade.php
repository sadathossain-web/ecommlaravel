@extends('layouts.fontend-master')
@section('content')

  <!-- Hero Section Begin -->
  <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    @php
                    $categoriess = App\Category::where('status',1)->latest()->get();
                 @endphp
                    <ul>
                        @foreach ($categoriess as $row)
                        <li><a href="#">{{ $row->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('fontend') }}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>My Profile</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>My Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<section class="shoping-cart spad">
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            @include('pages.profile.inc.sidebar')
        </div>
        <div class="col-sm-8">
          <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Invoice No.</th>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Coupon</th>
                        <th scope="col">Total</th>
                        <th scope="col">Delivery Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $item)
                      <tr>
                        <td>{{ $item->invoice_no }}</td>
                        <td>{{ $item->payment_type }}</td>
                        <td>{{ $item->subtotal }}$</td>
                        <td>
                            @if($item->coupon_discount == NULL)
                            <span class="badge badge-danger">No</span>
                            @else
                            <span class="badge badge-success">Yes</span>
                            @endif
                        </td>
                        <td>{{ $item->total }}$</td>
                        <td>
                             @if($item->delivery_status == 1)
                            <span class="badge badge-warning">Processing</span>
                            @else
                            <span class="badge badge-success">Delivered</span>
                            @endif</td></td>
                        <td>
                            <a href="{{ url('user/order-view/'.$item->id) }}" class="btn btn-danger btn-sm">View</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
</div>
</section>
@endsection
