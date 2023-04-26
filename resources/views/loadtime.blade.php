@extends('layouts.user_type.auth')

@section('content')

<html>
   

<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">SEOPro Website Speed Checker</h3>
                  <p class="mb-0">Measure Your Website Loading Time</p>
                </div>
                <div class="card-body">


                    <form role="form" method="POST" action=" {{ route('back') }} ">
                        @csrf
                        <label>Enter your url below:</label><br><br>
                        <div class="mb-3">

                        <input class="form-control" type="text" name="url" placeholder="place new topic"><br><br>
                      </div>

                        <div class="text-center">
                        <button type="submit" class="btn bg-gradient-info w-100" style="">Generate</button>
                      </div>
                    </form>
{{-- 
                    @if (isset($back))
                  
                        <div style="white-space: pre-line">  <h4 class="mb-0"> {{$back}} </h4> </div>
                    
<hr>

   <div class="mt-4 row">
    <div class="card">
      <div class="card-body p-3">
        <div class="text-end">
        </div>
        <div class="numbers">
          <h4 class="font-weight-bolder mb-0">You are one click away from a faster website!</h4>
          <br>
          <h6>Want a faster loading time? <br> Start by optmizing your pictures! </h6>
<br>
          <button type="submit" class="btn bg-gradient-info w-100 font-weight-bolder mb-0" style="border-top-color: red">Optimize Your Images Now</button>

        </div>
      </div>
    </div>
  </div>
  
  
                    @endif
 --}}

 @if (isset($back))
 

 @if ($back ==0)
 <h5 style="color:red">Your website doesn't exist! </h5>

 

 @elseif ($back <1.5 && $back !=0)


 <div style="white-space: pre-line">
    <h4 class="mb-0">This website takes {{$back}} seconds to load.</h4>
    <h5 style="color:goldenrod; margin-top:-20px;">Your website is optimized! </h5>

</div>


 @elseif ($back > 1.5 && $back != 'Invalid URL format.')


 <div style="white-space: pre-line">
    <h4 class="mb-0">This website takes {{$back}} seconds to load.</h4>
    <h5 style="color:red; margin-top:-20px;">Your website needs to get optimized! </h5>

</div>
 <hr>
     <div class="mt-4 row">
         <div class="card">
             <div class="card-body p-3">
                 <div class="text-end"></div>
                 <div class="numbers">
                     <h4 class="font-weight-bolder mb-0">You are one click away from a faster website!</h4>
                     <br>
                     <h6>Want a faster loading time? <br> Start by optimizing your pictures! </h6>
                     <br>
                     <button type="submit" class="btn bg-gradient-info w-100 font-weight-bolder mb-0" style="border-top-color: red">Optimize Your Images Now</button>
                 </div>
             </div>
         </div>
     </div>


     @elseif ($back == 'Invalid URL format.')


 <div style="white-space: pre-line">
    <h4 class="mb-0">{{$back}}</h4>

</div>

 @endif



 {{-- @if ($back == 0)
     <div class="mt-4 row">
         <div class="card">
             <div class="card-body p-3">
                 <div class="text-end"></div>
                 <div class="numbers">
                     <h4 class="font-weight-bolder mb-0">This domain doesn't exist.</h4>
                 </div>
             </div>
         </div>
     </div>
 @endif --}}
@endif


               
                </div>
              
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection

