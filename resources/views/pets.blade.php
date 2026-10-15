
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สัตว์เลี้ยงที่หาย | Pet Finder</title>

    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'IBM Plex Sans Thai', sans-serif;
            background: #fff;
            color: #45423D;
            line-height: 1.7;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input, select {
            font-family: inherit;
        }

        .container {
            width: 90%;
            max-width: 1150px;
            margin: auto;
        }

        nav {
            border-bottom: 1px solid #EAE8E4;
            padding: 18px 0;
            background: #fff;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-size: 25px;
            font-weight: 600;
            letter-spacing: -1px;
            white-space: nowrap;
        }

        .nav-links {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            font-size: 14px;
            color: #66615A;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #AAA198;
        }

        .page-heading {
            padding: 55px 0 30px;
        }

        .eyebrow {
            font-size: 12px;
            letter-spacing: 2px;
            color: #89847D;
            margin-bottom: 12px;
        }

        h1 {
            font-size: clamp(30px, 4vw, 42px);
            font-weight: 300;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 14px;
            color: #777168;
        }

        .search-area {
            display: flex;
            gap: 10px;
            margin: 10px 0 22px;
        }

        .search-area input,
        .search-area select {
            font-size: 14px;
            padding: 12px;
            border: 1px solid #E1DED9;
            background: #fff;
            color: #45423D;
            outline: none;
        }

        .search-area input {
            flex: 1;
            min-width: 0;
        }

        .search-area button {
            background: #45423D;
            color: #fff;
            border: 1px solid #45423D;
            padding: 0 22px;
            cursor: pointer;
            font-size: 14px;
        }

        .search-area button:hover {
            background: #fff;
            color: #45423D;
        }

        .filter-tabs {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .filter-tab {
            padding: 7px 18px;
            background: #fff;
            border: 1px solid #E1DED9;
            color: #66615A;
            cursor: pointer;
            font-size: 13px;
        }

        .filter-tab.active,
        .filter-tab:hover {
            background: #45423D;
            color: #fff;
            border-color: #45423D;
        }

        .pet-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
            padding-bottom: 30px;
        }

        .pet-card {
            border: 1px solid #EAE8E4;
            background: #fff;
            transition: transform .2s;
        }

        .pet-card:hover {
            transform: translateY(-3px);
        }

        .pet-image {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
        }

        .pet-info {
            padding: 18px;
        }

        .pet-info h2 {
            font-size: 20px;
            font-weight: 400;
            margin-bottom: 5px;
        }

        .pet-type {
            font-size: 12px;
            color: #89847D;
            margin-bottom: 10px;
        }

        .pet-location {
            font-size: 13px;
            color: #66615A;
            margin-bottom: 14px;
        }

        .detail-link {
            display: inline-block;
            font-size: 13px;
            border-bottom: 1px solid #89847D;
            padding-bottom: 2px;
        }

        .detail-link:hover {
            color: #89847D;
        }

        .no-results {
            display: none;
            text-align: center;
            padding: 35px;
            color: #89847D;
        }

        .result-count {
            color: #89847D;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .note {
            background: #F7F5F1;
            padding: 18px;
            margin: 10px 0 65px;
            color: #777168;
            font-size: 12px;
            line-height: 1.9;
        }

        footer {
            border-top: 1px solid #EAE8E4;
            padding: 22px 0;
            color: #89847D;
            font-size: 12px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        @media (max-width: 768px) {
            .nav-content {
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-links {
                gap: 12px;
            }

            .pet-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
            }

            .pet-image {
                height: 200px;
            }

            .search-area {
                flex-wrap: wrap;
            }

            .search-area input {
                flex-basis: 100%;
            }

            .search-area select {
                flex: 1;
                min-width: 0;
            }

            .search-area button {
                min-height: 42px;
            }

            .footer-content {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .pet-grid {
                grid-template-columns: 1fr;
            }

            .pet-image {
                height: 250px;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="container nav-content">
            <a href="{{ url('/') }}" class="logo">petfinder.</a>

            <div class="nav-links">
                <a href="{{ url('/') }}">หน้าหลัก</a>
                <a href="{{ url('/pets') }}" class="active">สัตว์เลี้ยงที่หาย</a>
                <a href="{{ url('/disease-stats') }}">สถิติโรคสัตว์</a>
                <a href="{{ url('/about') }}">เกี่ยวกับเรา</a>
                <a href="{{ url('/clue') }}">แจ้งเบาะแส</a>
                <a href="{{ url('/report') }}">แจ้งสัตว์หาย</a>
                <a href="{{ url('/login') }}">เข้าสู่ระบบ</a>
            </div>
        </div>
    </nav>

    <main class="container">

        <section class="page-heading">
            <div class="eyebrow">PET FINDER / LOST PETS</div>
            <h1>สัตว์เลี้ยงที่กำลังตามหา</h1>
            <p class="subtitle">
                ช่วยกันค้นหาและพาเพื่อนตัวน้อยกลับบ้าน
            </p>
        </section>

        <div class="search-area">
            <input
                type="text"
                id="searchInput"
                placeholder="ค้นหาชื่อสัตว์หรือจังหวัด..."
            >

            <select id="typeFilter">
                <option value="all">สัตว์ทุกประเภท</option>
                <option value="cat">แมว</option>
                <option value="dog">สุนัข</option>
                <option value="rabbit">กระต่าย</option>
                <option value="bird">นก</option>
            </select>

            <button type="button" id="searchButton">ค้นหา</button>
        </div>

        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">ทั้งหมด</button>
            <button class="filter-tab" data-filter="cat">แมว</button>
            <button class="filter-tab" data-filter="dog">สุนัข</button>
            <button class="filter-tab" data-filter="rabbit">กระต่าย</button>
            <button class="filter-tab" data-filter="bird">นก</button>
        </div>

        <p class="result-count" id="petCount">พบสัตว์เลี้ยง 4 รายการ</p>

        <section class="pet-grid" id="petGrid">

            <article class="pet-card"
                data-type="cat"
                data-search="ไมโล แมว กรุงเทพ กรุงเทพมหานคร">

                <img class="pet-image"
                    src="https://images.unsplash.com/photo-1573865526739-10659fec78a5?auto=format&fit=crop&w=800&q=85"
                    alt="แมวชื่อไมโล">

                <div class="pet-info">
                    <h2>ไมโล</h2>
                    <p class="pet-type">แมว · ขนสั้น</p>
                    <p class="pet-location">สถานที่หาย: กรุงเทพมหานคร</p>
                    <a href="#" class="detail-link" data-name="ไมโล">
                        ดูรายละเอียด →
                    </a>
                </div>
            </article>

            <article class="pet-card"
                data-type="dog"
                data-search="บิสกิต สุนัข นครราชสีมา โคราช">

                <img class="pet-image"
                    src="https://images.unsplash.com/photo-1552053831-71594a27632d?auto=format&fit=crop&w=800&q=85"
                    alt="สุนัขชื่อบิสกิต">

                <div class="pet-info">
                    <h2>บิสกิต</h2>
                    <p class="pet-type">สุนัข · โกลเด้นรีทรีฟเวอร์</p>
                    <p class="pet-location">สถานที่หาย: นครราชสีมา</p>
                    <a href="#" class="detail-link" data-name="บิสกิต">
                        ดูรายละเอียด →
                    </a>
                </div>
            </article>

            <article class="pet-card"
                data-type="rabbit"
                data-search="สโนวี่ กระต่าย ขอนแก่น">

                <img class="pet-image"
                    src="https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?auto=format&fit=crop&w=800&q=85"
                    alt="กระต่ายชื่อสโนวี่">

                <div class="pet-info">
                    <h2>สโนวี่</h2>
                    <p class="pet-type">กระต่าย · ขนสีขาว</p>
                    <p class="pet-location">สถานที่หาย: ขอนแก่น</p>
                    <a href="#" class="detail-link" data-name="สโนวี่">
                        ดูรายละเอียด →
                    </a>
                </div>
            </article>

            <article class="pet-card"
                data-type="bird"
                data-search="มะลิ นก เชียงใหม่">

                <img class="pet-image"
                    src="https://images.unsplash.com/photo-1552728089-57bdde30beb3?auto=format&fit=crop&w=800&q=85"
                    alt="นกชื่อมะลิ">

                <div class="pet-info">
                    <h2>มะลิ</h2>
                    <p class="pet-type">นกเลี้ยง · นกหงส์หยก</p>
                    <p class="pet-location">สถานที่หาย: เชียงใหม่</p>
                    <a href="#" class="detail-link" data-name="มะลิ">
                        ดูรายละเอียด →
                    </a>
                </div>
            </article>

        </section>

        <p class="no-results" id="noResults">
            ไม่พบสัตว์เลี้ยงที่ตรงกับการค้นหา
        </p>

        <div class="note">
            หมายเหตุ: รายการสัตว์เลี้ยงเป็นข้อมูลตัวอย่างสำหรับโครงงาน
            ยังไม่ได้เชื่อมต่อฐานข้อมูลจริง
        </div>

    </main>

    <footer>
        <div class="container footer-content">
            <span>petfinder. — ทุกการรอคอย มีความหวังที่จะได้พบกัน</span>
            <span>เว็บไซต์ตัวอย่างสำหรับโครงงาน</span>
        </div>
    </footer>

    <script>
        const searchInput = document.getElementById('searchInput');
        const typeFilter = document.getElementById('typeFilter');
        const searchButton = document.getElementById('searchButton');
        const petCards = document.querySelectorAll('.pet-card');
        const filterTabs = document.querySelectorAll('.filter-tab');
        const petCount = document.getElementById('petCount');
        const noResults = document.getElementById('noResults');

        let activeType = 'all';

        function filterPets() {
            const keyword = searchInput.value.trim().toLowerCase();

            const selectedType = typeFilter.value;
            const finalType = selectedType !== 'all'
                ? selectedType
                : activeType;

            let visibleCount = 0;

            petCards.forEach(function(card) {
                const petType = card.dataset.type;
                const petData = card.dataset.search.toLowerCase();

                const matchesKeyword = petData.includes(keyword);
                const matchesType =
                    finalType === 'all' || petType === finalType;

                if (matchesKeyword && matchesType) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            petCount.textContent =
                'พบสัตว์เลี้ยง ' + visibleCount + ' รายการ';

            noResults.style.display =
                visibleCount === 0 ? 'block' : 'none';
        }

        searchButton.addEventListener('click', filterPets);

        searchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                filterPets();
            }
        });

        typeFilter.addEventListener('change', function() {
            activeType = 'all';

            filterTabs.forEach(function(tab) {
                tab.classList.toggle(
                    'active',
                    tab.dataset.filter === typeFilter.value
                );
            });

            filterPets();
        });

        filterTabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                activeType = tab.dataset.filter;
                typeFilter.value = 'all';

                filterTabs.forEach(function(button) {
                    button.classList.remove('active');
                });

                tab.classList.add('active');
                filterPets();
            });
        });

        document.querySelectorAll('.detail-link').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                alert(
                    'ข้อมูลของ ' + link.dataset.name +
                    '\n\nหน้านี้เป็นตัวอย่าง ยังไม่ได้เชื่อมต่อฐานข้อมูล'
                );
            });
        });
    </script>

</body>
</html>
