<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      @include('includes.header')
            <!-- Drink Menu Page -->
       @include('includes.menu')
            <!-- end Drink Menu Page -->
          </div>

          <!-- About Us Page -->
          @include('includes.about')
          <!-- end About Us Page -->

          <!-- Special Items Page -->
         @include('includes.special')
          <!-- end Special Items Page -->

          <!-- Contact Page -->
          @include('includes.contact')
          <!-- end Contact Page -->
         </main>
          </div>    
          @include('includes.footer')
        </div>
    
         @include('includes.video')
         @include('includes.js')
  
</body>
</html>