

<body style="font-family:'IBM Plex Sans Thai',sans-serif;margin:0;color:#45423D;">
    <nav style="border-bottom:1px solid #EAE8E4;padding:18px 0;background:#fff;">
        <div
            style="width:90%;max-width:1150px;margin:auto;display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap;">
            <a href="{{ url('/') }}"
                style="font-size:25px;font-weight:600;text-decoration:none;color:#45423D;">petfinder.</a>
            <div style="display:flex;gap:24px;font-size:14px;color:#66615A;flex-wrap:wrap;">
                <a href="{{ url('/') }}" style="color:inherit;text-decoration:none;">หน้าหลัก</a>
                <a href="{{ url('/pets') }}" style="color:inherit;text-decoration:none;">สัตว์เลี้ยงที่หาย</a>
                <a href="{{ url('/disease-stats') }}"
                    style="color:#45423D;font-weight:600;text-decoration:none;">สถิติโรคสัตว์</a>
                <a href="{{ url('/about') }}" style="color:inherit;text-decoration:none;">เกี่ยวกับเรา</a>
                <a href="{{ url('/login') }}" style="color:inherit;text-decoration:none;">เข้าสู่ระบบ</a>
            </div>
        </div>
    </nav>
    @livewire('disease-stats')
    
    @livewireScripts
</body>
@
