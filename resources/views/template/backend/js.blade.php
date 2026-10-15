<!-- Mono JS (หลังบ้าน) -->
<script src="{{ asset('asset/backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset/backend/plugins/simplebar/simplebar.min.js') }}"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
<!-- ตาราง/กราฟ/แผนที่/ปฏิทิน/แจ้งเตือน -->
<script src="{{ asset('asset/backend/plugins/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('asset/backend/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/backend/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('asset/backend/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('asset/backend/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('asset/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('asset/backend/plugins/toaster/toastr.min.js') }}"></script>
<script src="{{ asset('asset/backend/js/mono.js') }}"></script>
<script src="{{ asset('asset/backend/js/custom.js') }}"></script>
{{-- โหลด chart/map เฉพาะหน้าที่มี element กัน error console --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#revenue-chart, #world-map, [name="dateRange"]')) {
      var s1 = document.createElement('script');
      s1.src = "{{ asset('asset/backend/js/chart.js') }}";
      document.body.appendChild(s1);
      var s2 = document.createElement('script');
      s2.src = "{{ asset('asset/backend/js/map.js') }}";
      document.body.appendChild(s2);
    }
  });
</script>

