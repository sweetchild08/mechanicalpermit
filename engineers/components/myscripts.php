<!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo assets('vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?php echo assets('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- Optional JS -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd3PjUqq81lIOfBPYXrQGWwK5T4ystZjA"></script>
  <!-- Argon JS -->
  <script src="<?php echo assets('js/argon.js?v=1.0.0') ?>"></script>
<script>
    Array.prototype.forEach.call(document.body.querySelectorAll("*[data-mask]"),applydatamask)

    function applydatamask(field)
    {
        var mask=field.dataset.mask.split('');
        function stripmask(maskeddata){
            function isdigit(char){
                return /\d/.test(char);
            }
            return maskeddata.split('').filter(isdigit);
        }
        function applymask(data){
            
        }
    }
</script>