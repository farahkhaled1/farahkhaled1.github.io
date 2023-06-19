@extends('layouts.user_type.auth')

@section('content')
<html>

  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-75" style="margin:-100px">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder" style="color: black">Enter your Arabic URL</h3>
                  <p class="mb-0">Generate alternative word</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('store_url') }}">
                    @csrf
                    <div class="mb-3">
                      <input class="form-control" type="text" name="url" placeholder="Enter your URL">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100"id="run-python-btn">Generate</button>
                      <!-- <button id="run-python-btn">Run Python</button> -->


                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



  
  <div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4" style="margin-left:180px">
      <div class="card">
        <div class="card-header pb-0">

          @php
$lastURL = \App\Models\Synonyms::getSynonyms();


@endphp

@if ($lastURL == null)

<h4>You Don't Have  History. <br> <span style="color: rgb(37,162,254)"> Start generating high rankng words!</span> </h4>

          <div class="row">


            <div class="col-lg-6 col-7">
              {{-- <h6>Phrase match</h6> --}}
              
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
          
        </div>
      </div>
    </div>
  </div>
  


@else
<h3>Your Last Search for: <span style="color: green; font-size: 20px"> {{ $lastURL }} </span></h3>

        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"   title="Before">
                  Before
                  </th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"   title="After">
                  After
                </th>
                </tr>
                
              </thead>
              <tbody>
              @foreach(\App\Models\Scrape::getWords() as $word)
              <tr>
                  <td>
                      <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $word->words_before}}</h6>
                          </div>
                      </div>
                  </td>
                  <td>
                      <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $word->words_after}}</h6>
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













{{-- 


       <div class="card z-index-2">
        <div class="card-header pb-0">
          <h6>Keywords overview</h6>
          <p class="text-sm">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> in 2021
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          --}}

{{-- 
  <div class="row mt-4">
    <div class="col-lg-5 mb-lg-0 mb-4">
     
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
         
               
                 
          </div>
        </div>
      </div>
    </div> --}}
    @endif
@endsection
</html>
@push('dashboard')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
@endpush




{{-- <main class="main-content  mt-0">    
    <section>
      <div class="page-header min-vh-75" style="margin:-60px">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder" style="color: black">Enter your Niche Keyword</h3>
                  <p class="mb-0">Generate the best keywords for your niche!</p>
                </div>
                <div class="card-body">

                        <div class="mb-3">

                        <input class="form-control" type="text" name="topic" placeholder="place new topic"><br><br>
                      </div>

                        <div class="text-center">
                        <button type="button" class="btn bg-gradient-info w-100" style="">Generate</button>
                      </div>
            
                  


                </div>
             
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              </div>
            </div>         
          </div>
        </div>
        
      </div>
    </section>
  </main>

  

  <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Keyword 1</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-xs font-weight-bold" style="color:red ; margin-left:50px "> 92 </span>

                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold"> 8$ </span>
                  </td>
                  <td class="align-middle">
                    <span class="text-xs font-weight-bold" style="margin-left: 100px"> 96K</span>

                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                    
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Keyword 2</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="avatar-group mt-2">
                        <span class="text-xs font-weight-bold" style="color:red ; margin-left:50px  "> 86 </span>

                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold"> 2.5$</span>
                  </td>
                  <td class="align-middle">
                    <span class="text-xs font-weight-bold" style="margin-left: 100px"> 90K</span>

                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                     
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Keyword 3</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="avatar-group mt-2">
                        <span class="text-xs font-weight-bold" style="color:orange ; margin-left:50px  "> 76 </span>

                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold"> 2.3$ </span>
                  </td>
                  <td class="align-middle">
                    <span class="text-xs font-weight-bold" style="margin-left: 100px"> 82K</span>

                     
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                     
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Keyword 4</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="avatar-group mt-2">
                        <span class="text-xs font-weight-bold" style="color:orange ; margin-left:50px "> 63 </span>

                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold"> 3.2$ </span>
                  </td>
                  <td class="align-middle">
                    <span class="text-xs font-weight-bold" style="margin-left: 100px"> 74K</span>

                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">keyword 5</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-xs font-weight-bold" style="color:green ; margin-left:50px  "> 43 </span>

                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold"> 1.5$ </span>
                  </td>
                  <td class="align-middle">
                    <span class="text-xs font-weight-bold" style="margin-left: 100px"> 39K</span>

                  </td>
                </tr> --}}
