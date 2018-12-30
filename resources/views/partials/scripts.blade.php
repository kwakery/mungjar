@if(Request::is('portfolio'))
  <script src="/js/app.js"></script>
  <script src="/js/masonry.min.js"></script>
  <script src="/js/isotope.min.js"></script>
  <script src="/js/imagesloaded.min.js"></script>
  <script type="text/javascript">
    $('.grid').masonry({
      // options
      itemSelector: '.grid-item',
      columnWidth: 200
    });
  </script>
@else
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });
  </script>
@endif
@if(Request::is('commissions/create') || Request::is('contact'))
  {!! NoCaptcha::renderJs() !!}
@endif
<script src="/js/bootstrap.bundle.min.js"></script>
