<footer class="pf-footer">
    <div><a class="pf-footer-brand" href="{{ route('home') }}"><i class="fa fa-paw" aria-hidden="true"></i> Pet Finder</a><p>เพราะทุกชีวิตมีค่า ช่วยกันพาน้องๆ กลับบ้าน · © {{ date('Y') }}</p></div>
    <nav aria-label="เมนูท้ายหน้า"><a href="{{ route('pets') }}">ประกาศทั้งหมด</a><a href="{{ route('report') }}">แจ้งสัตว์หาย</a><a href="{{ route('disease-stats') }}">สถิติโรคสัตว์</a><a href="{{ route('about') }}">เกี่ยวกับเรา</a><a href="{{ route('contact') }}">ติดต่อเรา</a></nav>
</footer>
