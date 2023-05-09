
@extends('layouts.user_type.auth')

@section('content')

    
<section>
  <div class="page-header min-vh-75" style="margin:-60px">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-5 col-md-6 d-flex flex-column mx-auto">
          <div class="card">
            <div class="card-header pb-0 text-left bg-transparent">

<h3 class="ms-2 mt-4 mb-0"> Enter your website URL below <span class="text-success font-weight-bolder"> for better alternative words:</span>  </h3>
{{-- <h4 class="ms-2 mt-4 mb-0"> Full domain analysis for <span class="text-success font-weight-bolder">"kyliecosmetics.com"</span>  </h4> --}}

<div class="card-body">


  <form role="form" method="POST" action=" {{ route('result') }} ">
      @csrf
      {{-- <label>Enter your website below:</label> --}}
      <br><br> 
      <div class="mb-3" style="margin-top: -40px">

      <input class="form-control" type="text" name="topic" placeholder="Place your URL"><br><br>
    </div>

      <div class="text-center">
      <button type="submit" class="btn bg-gradient-info w-100" style="">Generate</button>
    </div>
  </form>
</div></div></div></section>

@endsection

