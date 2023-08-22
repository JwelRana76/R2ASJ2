@extends('layouts.backend.main')
@section('content')
@php
        $lang = session()->get('language');
        app()->setLocale($lang);
    @endphp
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('breadcrumb.dashboard') }}</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>
    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      @if (Auth::user()->customer_id == null)
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Purchase QTY</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Purchase Amount</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Purchase Payment</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Purchase Due</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Sale QTY</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Sale Amount</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Sale Payment</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Sale Due</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Stock</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Product</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Customer</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
      @else
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total QTY</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Amount</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Payment</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card bg-success text-center text-black p-3 font-weight-bold">
            <h4>Total Due</h4>
            <p class="text-bold">
              
            </p>
          </div>
        </div>
      @endif

    </div>
    <!--Row-->
  </div>
@endsection
