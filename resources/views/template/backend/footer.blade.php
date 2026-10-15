<!-- Mono footer (ท้ายหลังบ้าน) -->
<footer class="footer mt-auto">
  <div class="copyright bg-white">
    <p>Pet Finder &copy; {{ date('Y') }} · ช่วยกันพาน้องกลับบ้าน <a class="text-primary ml-3" href="{{ route('home') }}">กลับหน้าแรก →</a></p>
  </div>
  <script>var d = new Date(); var year = d.getFullYear(); document.getElementById("copy-year") && (document.getElementById("copy-year").textContent = year);</script>
</footer>
