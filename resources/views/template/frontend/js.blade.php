<!-- JS Classimax หน้าบ้าน -->
<script src="{{ asset('asset/frontend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/frontend/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('asset/frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/frontend/plugins/bootstrap/bootstrap-slider.js') }}"></script>
<script src="{{ asset('asset/frontend/plugins/tether/js/tether.min.js') }}"></script>
<script src="{{ asset('asset/frontend/plugins/raty/jquery.raty-fa.js') }}"></script>
<script src="{{ asset('asset/frontend/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('asset/frontend/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
{{-- แผนที่ Google โหลดเฉพาะเมื่อมีคีย์ใน .env (GOOGLE_MAPS_API_KEY) + มี div#map กัน error --}}
@if(config('services.google.maps_key'))
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}" defer></script>
<script src="{{ asset('asset/frontend/plugins/google-map/map.js') }}" defer></script>
@endif
<script src="{{ asset('asset/frontend/js/script.js') }}"></script>
