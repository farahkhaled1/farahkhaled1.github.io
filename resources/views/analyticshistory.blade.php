@extends('layouts.user_type.auth')
@section('content')

<html>  
  <div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4" style="margin-left:180px">
      <div class="card">
        <div class="card-header pb-0">

          @php
$analytics = \App\Models\Analytics::getAnalytics();

@endphp


{{-- @if ($analytics == null) --}}
@if ($analytics->isEmpty())

<h4>You Don't Have Any Search History. <br> <span style="color: rgb(37,162,254)"> Start Analyzing Now!</span> </h4>

<br>

          <div class="row">
            <a href="{{ url('/analyzer')}}" >
            <button type="submit" class="btn bg-gradient-info w-100 font-weight-bolder mb-0" style="border-top-color: red">Try our Domain Analyzer Tool</button>
          </a>
            <div class="col-lg-6 col-7">
              
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
              <div class="dropdown float-lg-end pe-4">
                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">

                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
        </div>
      </div>
    </div>
  </div>

@else
<h3>Your Searched URLs <span style="color: green"> </span></h3>
          <div class="row">
            <div class="col-lg-6 col-7">
              {{-- <h6>Phrase match</h6> --}}
              <h5 class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">A list of the URLs you have analyzed earlier:</span>
              </h5>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
              <div class="dropdown float-lg-end pe-4">
                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-ellipsis-v text-secondary"></i>
                </a>
             
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
              
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" title="The keywords that appear in your niche.">
                    Domain
                  </th>
            
                
                </tr>
                
              </thead>
              <tbody>
              
                  
               
                {{-- @foreach(\App\Models\Analytics::getAnalytics()  as $analytics) --}}
                {{-- @foreach(\App\Models\Analytics::getAnalytics()->unique('domain_url') as $analytics)

                <tr>

                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <a href="{{ route('analyticshistorydetails')}}">

                                <h6 class="mb-0 text-sm">{{ $analytics->domain_url	 }}</h6>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach --}}

                @foreach(\App\Models\Analytics::getAnalytics()->unique('domain_url') as $analytics)
    <tr>
        <td>
            <div class="d-flex px-2 py-1">
                <div class="d-flex flex-column justify-content-center">
                    <a href="{{ route('analyticshistorydetails', ['domain_url' => $analytics->domain_url]) }}">
                        <h6 class="mb-0 text-sm">{{ $analytics->domain_url }}</h6>
                    </a>
                </div>
            </div>
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

    @endif
@endsection
</html>
