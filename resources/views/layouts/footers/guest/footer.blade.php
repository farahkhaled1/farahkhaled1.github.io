  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
      {{-- <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="https://www.google.com/" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Company
          </a>
          <a href="https:/google.com" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
          </a>
          <a href="https:/google.com" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Team
          </a>
          <a href="https://www.google.com/templates" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Products
          </a>
          <a href="https://www.google.com/blog" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Blog
          </a>
          <a href="https://www.google.com/support-terms" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Pricing
          </a>
      </div> --}}
        @if (!auth()->user() || \Request::is('static-sign-up')) 
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
              {{-- <a href="https://dribbble.com/creativetim" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-dribbble" aria-hidden="true"></span>
              </a>
              <a href="https://twitter.com/CreativeTim" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-twitter" aria-hidden="true"></span>
              </a>
              <a href="https://www.instagram.com/creativetimofficial/" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-instagram" aria-hidden="true"></span>
              </a> --}}
              {{-- <a href="https://ro.pinterest.com/thecreativetim/" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-pinterest" aria-hidden="true"></span>
              </a>
              <a href="https://github.com/creativetimofficial" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-github" aria-hidden="true"></span>
              </a> --}}
          </div>
        @endif
      </div>
     
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
