<script src="plugins/jquery/jquery.js"></script>
<!-- Bootstrap jQuery -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick-carousel/slick.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="plugins/google-map/gmap.js"></script>
<!-- main js -->
<script src="js/custom.js"></script>

 <!-- THEME JAVASCRIPT FILES
    ================================================== -->
    <!-- initialize jQuery Library -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap jQuery -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="plugins/google-map/gmap.js"></script>
    <!-- main js -->
    <script src="js/custom.js"></script>
    
<script>
        document.getElementById('reportForm')
            .addEventListener('submit', function(event) {
                event.preventDefault();

                document.getElementById('successMessage').style.display = 'block';

                document.getElementById('successMessage')
                    .scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
            });
    </script>