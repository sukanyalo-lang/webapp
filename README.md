# Pet Finder — ระบบแจ้งสัตว์เลี้ยงหายและพบสัตว์

Pet Finder เป็นเว็บแอปพลิเคชันภาษาไทยสำหรับลงประกาศสัตว์เลี้ยงหาย แจ้งพบสัตว์ และค้นหาประกาศเพื่อให้เจ้าของกับผู้พบสัตว์ติดต่อกันได้ มีส่วนจัดการสมาชิกและประกาศ พร้อมหน้าสถิติสุขภาพสัตว์จาก FSVO ของสวิตเซอร์แลนด์

แนวคิดของเว็บไซต์คือ **“เพราะทุกชีวิตมีค่า เราจะพาน้องๆ กลับบ้าน”** หน้าจอใช้โทนฟ้าขาว การ์ดขอบมน และเมนูหลังบ้านสีน้ำเงินเข้ม โดยใช้ Blade แสดงผลและ Livewire สำหรับฟอร์มกับตารางที่โต้ตอบกับเซิร์ฟเวอร์

เอกสารนี้อธิบายจากโค้ดใน repository ปัจจุบัน ชื่อฐานข้อมูล โดเมน และข้อมูลตอบกลับที่ยกตัวอย่างไม่ใช่ค่าจาก `.env` ของผู้พัฒนา

## สารบัญ

1. [ความสามารถและขอบเขต](#ความสามารถและขอบเขต)
2. [เทคโนโลยี](#เทคโนโลยี)
3. [โครงสร้างโปรเจกต์](#โครงสร้างโปรเจกต์)
4. [ติดตั้งและเริ่มใช้งาน](#ติดตั้งและเริ่มใช้งาน)
5. [ตั้งค่า environment](#ตั้งค่า-environment)
6. [คู่มือการใช้งาน](#คู่มือการใช้งาน)
7. [หน้าเว็บและ routes](#หน้าเว็บและ-routes)
8. [ฐานข้อมูล](#ฐานข้อมูล)
9. [การทำงานของโค้ด](#การทำงานของโค้ด)
10. [รายละเอียด API](#รายละเอียด-api)
11. [บริการภายนอกและแคช](#บริการภายนอกและแคช)
12. [แก้ไขดีไซน์และ Blade](#แก้ไขดีไซน์และ-blade)
13. [การทดสอบ](#การทดสอบ)
14. [แก้ปัญหาที่พบบ่อย](#แก้ปัญหาที่พบบ่อย)
15. [ข้อจำกัดและแนวทางพัฒนาต่อ](#ข้อจำกัดและแนวทางพัฒนาต่อ)

## ความสามารถและขอบเขต

### ฟีเจอร์หลัก

- แสดงประกาศล่าสุด 4 การ์ดบนหน้าแรกจากฐานข้อมูลจริง
- ค้นหาจากชื่อสัตว์ รายละเอียด สี และสายพันธุ์ พร้อมกรองประเภท สถานะ และสถานที่
- ลงประกาศสัตว์หายหรือพบสัตว์ พร้อมรูปหนึ่งรูปและข้อมูลติดต่อ
- ดูประกาศของตนเอง เปลี่ยนสถานะ และลบประกาศ
- สมัครสมาชิก เข้าสู่ระบบ ออกจากระบบ รีเซ็ตรหัสผ่าน และแก้ไขโปรไฟล์
- เปลี่ยนรหัสผ่านและใช้การยืนยันตัวตนสองขั้นตอนผ่าน Jetstream/Fortify
- แสดงแดชบอร์ดยอดสมาชิก ประกาศทั้งหมด ประกาศสัตว์หาย กราฟประกาศใหม่ 7 วัน และประกาศล่าสุด 5 รายการ
- เพิ่ม แก้ไข ลบสมาชิกและประกาศผ่านหน้าหลังบ้าน
- แสดงสถิติโรคสัตว์จาก FSVO Switzerland พร้อมตัวกรองและ JSON API

### ขอบเขตที่ต้องเข้าใจ

| เรื่อง | พฤติกรรมปัจจุบัน |
| --- | --- |
| สิทธิ์หลังบ้าน | ตรวจการเข้าสู่ระบบ แต่ยังไม่มีการแยกบทบาทผู้ดูแลกับสมาชิกทั่วไป |
| หน้าติดต่อเรา | ฟอร์มสาธิต แสดงข้อความสำเร็จในเบราว์เซอร์ ยังไม่บันทึกหรือส่งอีเมล |
| หน้ารายละเอียดสัตว์ | ยังไม่มี route `/pets/{id}`; กดชื่อบนหน้าแรกแล้วไปค้นหาชื่อในหน้าประกาศ |
| รูปประกาศ | รองรับรูปเดียวต่อประกาศ ยังไม่มีแกลเลอรี |
| สถานะ `found` | หมายถึงแจ้งพบสัตว์/ตามหาเจ้าของ ไม่ใช่หลักฐานว่าส่งคืนเจ้าของแล้ว |
| สถิติโรคสัตว์ | ข้อมูลของสวิตเซอร์แลนด์ แยกจากข้อมูลประกาศในประเทศไทย |
| แผนที่ | มี config คีย์และสคริปต์แบบมีเงื่อนไข แต่ยังไม่มีระบบปักหมุดในฟอร์ม |

## เทคโนโลยี

| ส่วน | เทคโนโลยี | หน้าที่ |
| --- | --- | --- |
| เซิร์ฟเวอร์ | PHP และ Laravel 9 | routes, validation, session, ORM และบริการ |
| บัญชีผู้ใช้ | Jetstream 3 และ Fortify | สมัครสมาชิก login โปรไฟล์ รหัสผ่าน และ 2FA |
| API authentication | Sanctum 2 | ป้องกัน `/api/user` |
| UI โต้ตอบ | Livewire 2 | CRUD สมาชิก/ประกาศ และตัวกรองสถิติ |
| Template | Blade | หน้าเว็บ เลย์เอาต์ และ components |
| หน้าบ้าน | Bootstrap และ Classimax assets | grid, ฟอร์ม และสคริปต์พื้นฐาน |
| หลังบ้าน | Mono assets | sidebar, navbar และปลั๊กอิน |
| โปรไฟล์/ความปลอดภัย | Tailwind CSS 3 และ Alpine.js 3 | components, dropdown และ modal |
| Build | Vite 3 | สร้าง CSS/JavaScript จาก `resources/` |
| ฐานข้อมูลเริ่มต้น | MySQL | สมาชิก ประกาศ session และข้อมูลระบบ |
| Tests | PHPUnit 9 | ทดสอบระบบบัญชีและพฤติกรรมแอป |

ตรวจเวอร์ชันที่ติดตั้งจริงจาก `composer.lock` และ `package-lock.json` ใช้ `composer install` และ `npm ci` เพื่อยึดเวอร์ชันตาม lockfile โปรเจกต์ยังมีคำสั่ง Laravel Mix เดิมใน `package.json` แต่เลย์เอาต์ปัจจุบันใช้ `@vite` จึงใช้ `npm run dev` และ `npm run build` เป็นหลัก

## โครงสร้างโปรเจกต์

```text
app/
├── Actions/Fortify/                สร้างบัญชี อัปเดตโปรไฟล์ และรหัสผ่าน
├── Actions/Jetstream/              การลบบัญชี
├── Http/Controllers/
│   └── PetReportController.php     ประกาศหน้าบ้านและประกาศของฉัน
├── Http/Livewire/                  ฟอร์มและตารางแบบโต้ตอบ
├── Models/                        โมเดล User, PetReport และไฟล์เดิม
├── Providers/                     ลงทะเบียนบริการ routes และระบบบัญชี
└── Services/
    └── BlvAnimalHealthService.php  ดาวน์โหลด แปลง และแคชข้อมูล FSVO
config/                            ตั้งค่าฐานข้อมูล บัญชี ไฟล์ และอีเมล
database/                          migrations, factories และ seeders
public/
├── asset/frontend/                CSS รูปภาพ ฟอนต์ และปลั๊กอินหน้าบ้าน
├── asset/backend/                 assets หลังบ้าน
├── build/                         ผลลัพธ์จาก Vite
└── storage/                       symbolic link ไป storage/app/public
resources/
├── css/ และ js/                   ไฟล์ต้นทางสำหรับ Vite
└── views/                         หน้าเว็บ Blade ทั้งระบบ
routes/
├── web.php                        เส้นทางเว็บ
└── api.php                        เส้นทาง JSON API
storage/
├── app/public/pet-reports/         รูปที่อัปโหลดผ่านประกาศ
├── framework/                     cache, session และ compiled views
└── logs/                          log ของแอป
tests/                             Feature tests และ Unit tests
```

รันคำสั่งจากรากแอปที่มี `artisan`, `composer.json` และ `routes/` อยู่ร่วมกัน

## ติดตั้งและเริ่มใช้งาน

### 1. เตรียมเครื่องมือ

- PHP ที่ผ่านข้อกำหนดใน lockfile; Laravel ที่ล็อกไว้ต้องการอย่างน้อย PHP 8.0.2 สภาพแวดล้อมพัฒนาของโปรเจกต์นี้ใช้ PHP 8.2
- Composer และ PHP extensions ตาม dependency เช่น PDO MySQL, Mbstring, OpenSSL, Fileinfo และ XML
- Node.js และ npm ที่ติดตั้ง dependency ตาม `package-lock.json` ได้
- MySQL และเว็บเซิร์ฟเวอร์ หรือใช้ `php artisan serve` สำหรับพัฒนา
- อินเทอร์เน็ตสำหรับติดตั้ง dependency และโหลดฟอนต์/บริการภายนอก

```powershell
php -v
composer --version
node --version
npm.cmd --version
```

ตัวอย่างใช้ `npm.cmd` เพื่อเลี่ยงปัญหา PowerShell บล็อก `npm.ps1` บนระบบอื่นใช้ `npm` แทนได้

### 2. ติดตั้ง dependency

```powershell
composer install
npm.cmd ci
composer check-platform-reqs --lock
```

### 3. เตรียม `.env`

หากยังไม่มี `.env`:

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

หากติดตั้งต่อจากระบบเดิมที่มี `APP_KEY` แล้ว ให้ใช้ key เดิมต่อ ไม่ควรสร้างใหม่โดยไม่ตรวจข้อมูลที่เข้ารหัสไว้

ตั้งค่าตัวอย่างดังนี้ โดยเปลี่ยนชื่อฐานข้อมูลและบัญชีให้ตรงกับเครื่อง:

```dotenv
APP_NAME="Pet Finder"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pet_finder
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
SESSION_DRIVER=database
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=local
```

สร้างฐานข้อมูล `pet_finder` ก่อน migrate โดยเลือก character set `utf8mb4` สำหรับภาษาไทย ชื่อนี้เป็นตัวอย่าง ไม่ได้บังคับให้ใช้ชื่อเดียวกัน

### 4. สร้างตารางและเชื่อมรูปภาพ

```powershell
php artisan config:clear
php artisan migrate
php artisan storage:link
```

`storage:link` เชื่อม `public/storage` ไปยัง `storage/app/public` เพื่อเปิดรูปผ่าน `/storage/...` โค้ดอัปโหลดประกาศระบุ disk `public` โดยตรง แม้ disk เริ่มต้นจะเป็น `local`

**ฐานข้อมูลเก่า:** migration `2026_10_15_000003_drop_unused_disease_reports_table.php` จะลบตาราง `disease_reports` หากพบ และไม่สร้างคืนเมื่อ rollback ตรวจและสำรองข้อมูลที่ต้องการเก็บก่อนใช้ migration นี้กับฐานข้อมูลเดิม

### 5. เพิ่มข้อมูลตัวอย่าง ถ้าต้องการ

```powershell
php artisan db:seed
```

`DatabaseSeeder` ทำงานเฉพาะ `APP_ENV=local` และเมื่อ `pet_reports` ยังว่าง โดยเพิ่มประกาศ 6 รายการและสร้างบัญชีต่อไปนี้หากยังไม่มี:

| รายการ | ค่าจาก seeder |
| --- | --- |
| อีเมล | `demo@petfinder.local` |
| รหัสผ่าน | `password` |
| ชื่อ | `Pet Finder Demo` |

หากอีเมลนี้มีอยู่แล้ว seeder ใช้บัญชีเดิมและไม่เปลี่ยนรหัสผ่าน ข้อมูลตัวอย่างไม่มีไฟล์รูป จึงอาจเห็นภาพสำรอง บัญชีนี้มีไว้สาธิตในเครื่องเท่านั้น

### 6. เปิดเว็บ

```powershell
npm.cmd run build
php artisan serve
```

เปิด `http://127.0.0.1:8000` และตั้ง `APP_URL` ให้ตรงกับ URL ที่ใช้งานจริง ระหว่างแก้ CSS/JavaScript สามารถเปิดอีก terminal แล้วใช้:

```powershell
npm.cmd run dev
```

Vite dev server ดูแล assets ส่วน `php artisan serve` ดูแล Laravel ต้องเปิดทั้งสอง process หากเลือกโหมด development

### ใช้กับ Laragon

1. วางโปรเจกต์ในโฟลเดอร์ `www` และเปิด MySQL กับ Apache/Nginx
2. ตั้ง virtual host ให้ document root ชี้มาที่ **โฟลเดอร์ `public`** ของแอป
3. ตั้ง `APP_URL` เป็นโดเมนที่เลือก เช่น `http://pet.test`
4. รัน `php artisan config:clear` หลังแก้ `.env`

จุดเข้าเว็บคือ `public/index.php` ไม่ควรใช้รากโปรเจกต์เป็น document root

## ตั้งค่า environment

| ตัวแปร | หน้าที่ |
| --- | --- |
| `APP_NAME` | ชื่อในจุดที่อ่านจาก config; ข้อความ Pet Finder บางส่วนเขียนใน Blade โดยตรง |
| `APP_ENV` | สภาพแวดล้อม เช่น `local`, `testing`, `production`; seeder ตรวจค่านี้ |
| `APP_KEY` | key สำหรับการเข้ารหัสของ Laravel |
| `APP_DEBUG` | รายละเอียดข้อผิดพลาดระหว่างพัฒนา |
| `APP_URL` | URL หลักสำหรับลิงก์และ assets |
| `DB_*` | การเชื่อมต่อฐานข้อมูล |
| `SESSION_DRIVER` | `.env.example` ใช้ `database` จึงต้องมีตาราง `sessions` |
| `CACHE_DRIVER` | ที่เก็บแคช รวมข้อมูล FSVO |
| `FILESYSTEM_DISK` | disk หลัก; รูปประกาศใช้ public disk ตามโค้ด |
| `MAIL_*` | อีเมล เช่น ลิงก์รีเซ็ตรหัสผ่าน |
| `GOOGLE_MAPS_API_KEY` | ตัวเลือกสำหรับสคริปต์ Google Maps ใน `config/services.php` |

ทดลองรีเซ็ตรหัสผ่านโดยเขียนอีเมลลง log แทนการส่งจริงได้ด้วย:

```dotenv
MAIL_MAILER=log
MAIL_FROM_ADDRESS=hello@example.test
MAIL_FROM_NAME="Pet Finder"
```

ดูข้อความผ่านระบบ log ของแอป เช่น `storage/logs/laravel.log` เมื่อใช้ file logging สำหรับอีเมลจริงให้ตั้ง SMTP ที่ใช้งานได้

`config/app.php` ปัจจุบันใช้ timezone `UTC` และ locale `en` แม้ UI ส่วนใหญ่เป็นภาษาไทย หากต้องการให้การแบ่งวันของกราฟและเวลาของเซิร์ฟเวอร์ตรงกับประเทศไทย ให้ปรับ timezone ในไฟล์นี้เป็น `Asia/Bangkok` การเปลี่ยนภาษาอย่างเดียวไม่ได้เปลี่ยน timezone

## คู่มือการใช้งาน

### ค้นหาประกาศ

1. เปิดหน้าแรกหรือ “ประกาศทั้งหมด”
2. ใส่คำค้นหาและเลือกประเภทสัตว์ สถานะ หรือสถานที่
3. อ่านรายละเอียดและข้อมูลติดต่อจากการ์ดประกาศ
4. สมัครสมาชิกหรือเข้าสู่ระบบหากต้องการลงประกาศ

หน้ารายการแสดงเฉพาะ `lost` และ `found` เรียงใหม่ไปเก่า แบ่งหน้า 9 รายการ และเก็บ query string ของตัวกรองระหว่างเปลี่ยนหน้า

### ลงประกาศ

1. กด “แจ้งสัตว์หาย” หรือ “แจ้งพบสัตว์” บนหน้าแรก ระบบเลือกสถานะเริ่มต้นให้
2. กรอกประเภท ชื่อ สายพันธุ์ สี และวันที่พบเห็น
3. เลือกจังหวัด/อำเภอ/ตำบล หรือพิมพ์สถานที่เอง
4. เพิ่มรายละเอียด รูป และผู้ติดต่อ แล้วกดบันทึก
5. เมื่อผ่าน validation ระบบกลับไปหน้ารายการพร้อมข้อความสำเร็จ

| ข้อมูล | เงื่อนไข |
| --- | --- |
| ชื่อสัตว์ | จำเป็น ไม่เกิน 100 ตัวอักษร |
| ประเภท | `แมว`, `สุนัข`, `นก`, `กระต่าย`, `อื่นๆ` |
| สถานะตอนสร้างหน้าบ้าน | `lost` หรือ `found` |
| สายพันธุ์/สี | ไม่จำเป็น ช่องละไม่เกิน 100 ตัวอักษร |
| รายละเอียด | จำเป็น ไม่เกิน 3,000 ตัวอักษร |
| สถานที่ | จำเป็น ไม่เกิน 255 ตัวอักษร |
| วันที่พบเห็น | ไม่จำเป็น แต่ต้องไม่เกินวันนี้ |
| ผู้ติดต่อ | จำเป็น ชื่อไม่เกิน 100 และเบอร์ไม่เกิน 30 ตัวอักษร |
| รูป | ไม่จำเป็น JPG/JPEG, PNG, WEBP ไม่เกิน 5 MB |

เบอร์ติดต่อยังไม่ได้จำกัดรูปแบบให้เป็นเบอร์โทรไทย และวันใน validation อ้างอิง timezone ของแอป

### ประกาศของฉัน

แสดงข้อมูลที่ `user_id` ตรงกับผู้ใช้ปัจจุบัน สามารถเปลี่ยนสถานะและลบได้ แต่ยังไม่มีหน้าฟอร์มแก้รายละเอียดของตนเองในส่วนนี้

| สถานะ | ความหมาย | แสดงสาธารณะ |
| --- | --- | --- |
| `lost` | แจ้งสัตว์เลี้ยงหาย | แสดง |
| `found` | แจ้งพบสัตว์/ตามหาเจ้าของ | แสดง |
| `closed` | ปิดประกาศ | ไม่แสดง |

การเปลี่ยนสถานะและลบผ่าน controller ตรวจเจ้าของ หากไม่ใช่เจ้าของจะตอบ `403` การลบประกาศลบรูปที่เกี่ยวข้องด้วย

### หลังบ้านและบัญชี

- หลัง login สำเร็จใช้ `/dashboard` เป็นปลายทางหลักตาม `RouteServiceProvider::HOME`
- กราฟแดชบอร์ดนับประกาศที่สร้างในช่วง 7 วัน ไม่ใช่จำนวนผู้เข้าชม
- หน้าสมาชิกเพิ่ม แก้ไข และลบบัญชีได้; ช่องรหัสผ่านตอนแก้ไขเว้นว่างเพื่อคงค่าเดิม
- หน้าจัดการประกาศแสดง 10 รายการต่อหน้า ค้นหาชื่อสัตว์ สถานที่ เบอร์ และประเภทได้
- ฟอร์มหลังบ้านรองรับ `lost`, `found`, `closed` และเปลี่ยนรูปประกาศได้
- โปรไฟล์ดูแลชื่อ อีเมล รหัสผ่าน 2FA session และการลบบัญชีตามฟีเจอร์ Jetstream

**สิทธิ์ปัจจุบัน:** “หลังบ้าน” เป็นชื่อกลุ่มหน้าจอ ยังไม่มี role หรือ middleware ตรวจผู้ดูแล สมาชิกที่เข้าสู่ระบบเข้าถึง routes กลุ่มนี้ได้

## หน้าเว็บและ routes

### หน้าสาธารณะ

| Method | URL | Route name | หน้าที่ |
| --- | --- | --- | --- |
| GET | `/` | `home` | หน้าแรก |
| GET | `/pets` | `pets` | รายการและตัวกรอง |
| GET | `/report` | `report` | ผู้เยี่ยมชมเห็นคำแนะนำให้เข้าสู่ระบบ |
| GET | `/about` | `about` | เกี่ยวกับเว็บ |
| GET | `/contact` | `contact` | ฟอร์มติดต่อสาธิต |
| GET | `/disease-stats` | `disease-stats` | สถิติโรคสัตว์ |

### ต้องเข้าสู่ระบบ

| Method | URL | Route name | หน้าที่ |
| --- | --- | --- | --- |
| POST | `/report` | `report.store` | สร้างประกาศ |
| GET | `/dashboard` | `dashboard` | ภาพรวม |
| GET | `/users` | `users` | จัดการสมาชิก |
| GET | `/addusers` | `addusers` | เพิ่มสมาชิก |
| GET | `/edituser/{id}` | `edituser` | แก้สมาชิก |
| GET | `/manage-pets` | `pet-reports` | จัดการประกาศ |
| GET | `/my-reports` | `my-reports` | ประกาศของบัญชีปัจจุบัน |
| PATCH | `/my-reports/{petReport}/status` | `my-reports.status` | เปลี่ยนสถานะ; ตรวจเจ้าของ |
| DELETE | `/my-reports/{petReport}` | `my-reports.destroy` | ลบ; ตรวจเจ้าของ |

Fortify/Jetstream ลงทะเบียน routes บัญชีเพิ่ม เช่น `/login`, `/register`, `/forgot-password`, `/reset-password/{token}`, `/two-factor-challenge`, `/user/profile` และ `/user/confirm-password` ขึ้นกับฟีเจอร์ที่เปิด ตรวจรายการจริงด้วย:

```powershell
php artisan route:list
php artisan route:list --path=api
```

## ฐานข้อมูล

### ตารางหลัก

| ตาราง | ข้อมูล |
| --- | --- |
| `users` | สมาชิกและรหัสผ่านที่แฮช |
| `pet_reports` | รายละเอียดประกาศ เจ้าของ รูป และผู้ติดต่อ |
| `sessions` | session เมื่อใช้ database driver |
| `password_resets` | token รีเซ็ตรหัสผ่าน |
| `personal_access_tokens` | Sanctum tokens; การมีตารางไม่ได้แปลว่าหน้าสร้าง token เปิดอยู่ |
| `failed_jobs` | queue jobs ที่ล้มเหลว |
| `migrations` | ประวัติ migration ของ Laravel |

### ตาราง `pet_reports`

| คอลัมน์ | ชนิด/เงื่อนไข | รายละเอียด |
| --- | --- | --- |
| `id` | Primary key | รหัสประกาศ |
| `user_id` | Foreign key | อ้างอิง `users.id` |
| `pet_name` | String 100 | ชื่อสัตว์ |
| `pet_type` | String 40 | ประเภท |
| `breed` | String 100, nullable | สายพันธุ์ |
| `color` | String 100, nullable | สี/ลักษณะ |
| `status` | String 20, default `lost` | สถานะ |
| `description` | Text | รายละเอียด |
| `location` | String 255 | ที่อยู่แบบข้อความ |
| `last_seen_at` | Date, nullable | วันที่พบเห็น |
| `photo_path` | String, nullable | path รูปบน public disk |
| `contact_name` | String 100 | ผู้ติดต่อ |
| `contact_phone` | String 30 | เบอร์โทร |
| `created_at`, `updated_at` | Timestamp | เวลาสร้าง/แก้ไข |

มี index คู่ `status, pet_type` และ index ของ `location` จังหวัด/อำเภอ/ตำบลไม่ได้แยกตาราง และยังไม่มี latitude/longitude

สมาชิกหนึ่งคนมีประกาศได้หลายรายการ โดย `PetReport::user()` เป็น `belongsTo(User::class)` แต่โมเดล `User` ยังไม่มีเมธอด `petReports()` จึงค้นประกาศด้วย `where('user_id', ...)`

Foreign key ใช้ `cascadeOnDelete()` เมื่อลบสมาชิก ฐานข้อมูลลบแถวประกาศตามไปด้วย อย่างไรก็ตาม cascade ไม่เรียกขั้นตอนลบไฟล์ใน controller รูปอาจเหลือบน disk ได้

## การทำงานของโค้ด

### ประกาศหน้าบ้าน

```text
เบราว์เซอร์
  → routes/web.php
  → PetReportController
  → ตรวจ request / ผู้ใช้ / เจ้าของตาม action
  → PetReport (Eloquent) และ public disk
  → Blade หรือ redirect พร้อมข้อความสถานะ
```

| เมธอด | หน้าที่ |
| --- | --- |
| `index()` | ค้นหา กรอง เรียง และแบ่งหน้า `lost`/`found` |
| `create()` | เปิด `report.blade.php` |
| `store()` | validate กำหนดเจ้าของ อัปโหลดรูป และสร้างประกาศ |
| `myReports()` | อ่านประกาศของผู้ใช้ทุกสถานะ |
| `updateStatus()` | ตรวจเจ้าของและบันทึกสถานะ |
| `destroy()` | ตรวจเจ้าของ ลบรูป และลบประกาศ |

Route หน้าแรกส่งประกาศ 6 รายการพร้อม `$lostCount`/`$foundCount` แต่ view ปัจจุบันเลือกแสดง 4 การ์ดและไม่ได้แสดงยอดนับสองตัวนี้

### Livewire

| Component | View ใน `resources/views/` | หน้าที่ |
| --- | --- | --- |
| `Usertable` | `livewire/usertable.blade.php` | อ่านและลบสมาชิก |
| `Addusertable` | `livewire/addusertable.blade.php` | สร้างสมาชิก/แฮชรหัสผ่าน |
| `Editusertable` | `livewire/editusertable.blade.php` | โหลดและอัปเดตสมาชิก |
| `PetReportCrud` | `livewire/pet-report-crud.blade.php` | CRUD ประกาศ รูป ค้นหา และแบ่งหน้า |
| `DiseaseStats` | `livewire/disease-stats.blade.php` | กรองและแบ่งหน้าสถิติ |

`wire:model` ผูกค่าช่องกรอกกับ property ส่วน `wire:click` และ `wire:submit.prevent` เรียกเมธอดเซิร์ฟเวอร์ ตัวอย่างประกาศคือ `edit(id)` โหลดข้อมูลเข้าฟอร์ม แล้ว `save()` ตรวจและบันทึก เมื่อเปลี่ยนรูปจะลบรูปเก่า

### บัญชีและฟีเจอร์ที่เปิด

- `FortifyServiceProvider` เชื่อม actions สร้างบัญชี อัปเดตโปรไฟล์และรหัสผ่าน
- จำกัด login 5 ครั้งต่อนาทีตามอีเมล/IP และจำกัดคำขอ 2FA ตาม session ของการเข้าสู่ระบบ
- `config/fortify.php` เปิด registration, reset password, profile/password update และ 2FA แต่ปิด email verification
- `config/jetstream.php` เปิด account deletion แต่ปิด teams, profile photos และหน้า API token management
- ไฟล์ view ของฟีเจอร์ที่ปิดยังอยู่ การมีไฟล์ไม่ได้หมายความว่ามี route เปิดใช้งาน

## รายละเอียด API

`routes/api.php` ได้ prefix `/api` จาก `RouteServiceProvider` ปัจจุบันเป็น API อ่านข้อมูล ยังไม่มี JSON endpoints สำหรับสร้าง แก้ไข หรือลบประกาศ

### GET `/api/pets`

คืน `lost`/`found` เรียงล่าสุดและแบ่งหน้า ไม่ต้องเข้าสู่ระบบ

| Query | ค่าเริ่มต้น | ความหมาย |
| --- | --- | --- |
| `q` | ไม่กรอง | ค้นหาบางส่วนในชื่อ รายละเอียด สี สายพันธุ์ |
| `type` | ไม่กรอง | เทียบประเภทตรงค่า เช่น `แมว` |
| `status` | ไม่กรอง | `lost`/`found`; ระบุ `closed` จะไม่พบเพราะ query หลักตัดไว้ |
| `location` | ไม่กรอง | ค้นหาบางส่วนในสถานที่ |
| `per_page` | `9` | จำนวนรายการต่อหน้า |
| `page` | `1` | หน้าที่ต้องการ |

```powershell
Invoke-RestMethod -Uri 'http://127.0.0.1:8000/api/pets?status=lost&per_page=4'

$petKeyword = [uri]::EscapeDataString('แมว')
Invoke-RestMethod -Uri "http://127.0.0.1:8000/api/pets?q=$petKeyword"
```

ตัวอย่างบางส่วนของ response:

```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "pet_name": "มะลิ",
      "pet_type": "แมว",
      "breed": "แมวไทย",
      "color": "ขาว มีแต้มเทา",
      "status": "lost",
      "description": "แมวขาวแต้มเทา สวมปลอกคอสีฟ้า",
      "location": "อำเภอเมืองสุรินทร์ จังหวัดสุรินทร์",
      "last_seen_at": "2026-10-15",
      "contact_name": "ผู้ติดต่อสาธิต",
      "contact_phone": "080-000-0000",
      "photo_url": null,
      "created_at": "2026-10-16T03:00:00.000000Z"
    }
  ],
  "per_page": 9,
  "total": 1
}
```

Laravel ส่ง pagination links และ metadata เพิ่มจากตัวอย่างนี้ หากมีรูป `photo_url` สร้างจาก `asset('storage/...')` ข้อมูลชื่อ/เบอร์ติดต่อแสดงใน public API ด้วย ส่วน `per_page` ยังไม่มี validation จำกัดช่วงค่า

### GET `/api/pets/stats`

นับทุกสถานะจากฐานข้อมูล ไม่ต้องเข้าสู่ระบบ ตัวอย่าง:

```json
{
  "lost": 3,
  "found": 2,
  "closed": 1,
  "total": 6
}
```

`total` รวมประกาศที่ปิด จึงอาจมากกว่าจำนวนในรายการสาธารณะ

### GET `/api/blv/stats`

อ่านจาก `BlvAnimalHealthService` แล้วกรอง ไม่ต้องเข้าสู่ระบบ

| Query | ความหมาย |
| --- | --- |
| `year` | ปีแบบตัวเลข |
| `canton` | รหัสพื้นที่สวิตเซอร์แลนด์ เทียบตรงค่า |
| `search` | ค้นข้อความในแต่ละแถวโดยไม่แยกตัวพิมพ์ใหญ่เล็ก |

```powershell
Invoke-RestMethod -Uri 'http://127.0.0.1:8000/api/blv/stats?year=2024&canton=BE'
```

Response ประกอบด้วย:

- `source`: FSVO และ URL descriptor ที่ service ใช้
- `total`: จำนวนแถวหลังกรอง
- `grand_count`: ผลรวม `count` หลังกรอง
- `sample`: สูงสุด 50 แถวแรก ไม่ใช่ผลลัพธ์ทั้งหมด

ตัวกรอง `group`/`species` มีใน Livewire `DiseaseStats` แต่ API route นี้ยังไม่อ่านสอง parameter ดังกล่าว

### GET `/api/user`

ใช้ `auth:sanctum` อ่านผู้ใช้ที่ยืนยันตัวตนแล้ว ตัวอย่างเมื่อมี personal access token ที่ออกให้อย่างถูกต้อง:

```powershell
$petApiHeaders = @{
    Accept = 'application/json'
    Authorization = 'Bearer <YOUR_TOKEN>'
}
Invoke-RestMethod -Uri 'http://127.0.0.1:8000/api/user' -Headers $petApiHeaders
```

หน้าออก API token ใน Jetstream ยังปิด และ `EnsureFrontendRequestsAreStateful` ในกลุ่ม API ยังถูกคอมเมนต์ จึงไม่ควรสมมติว่า cookie login จากเว็บใช้เรียก endpoint นี้จาก SPA ได้ทันที

## บริการภายนอกและแคช

### จังหวัด/อำเภอ/ตำบล

JavaScript ใน `resources/views/report.blade.php` ดาวน์โหลด JSON จาก `kongvut/thai-province-data` บน `raw.githubusercontent.com` โดยลองชุด `api/latest` ก่อนและ fallback ไปชื่อไฟล์เดิม

เมื่อเลือกพื้นที่จะประกอบข้อความใส่ `location` หากโหลดไม่สำเร็จยังพิมพ์สถานที่เองได้ ส่วนรายการจังหวัดหน้าแรกเขียนไว้ใน view จึงไม่ได้มีครบทุกจังหวัดเหมือนในฟอร์ม

### FSVO / BLV

`app/Services/BlvAnimalHealthService.php` ทำงานตามลำดับ:

1. อ่าน descriptor ที่ `https://www.data.blv.admin.ch/ogd/animal_health_statistics/animal-health-statistics.json`
2. ใช้ `resources[0].path` เป็น CSV URL หากอ่านได้
3. หากอ่านไม่ได้ ใช้ `animal-health-statistics.csv` ในโฟลเดอร์เดียวกันเป็น fallback
4. ดาวน์โหลดและตรวจ header ของ CSV
5. แปลงเป็น `year`, `canton`, `diseases_group`, `diseases`, `species`, `count`
6. เก็บแคช key `blv_animal_health_rows` อายุ `21600` วินาที หรือ 6 ชั่วโมง

รายละเอียดที่มีผลต่อการแสดงผล:

- จำกัดสูงสุด 20,000 แถว จึงไม่ควรอธิบายผลรวมว่าเป็นข้อมูลทั้งหมดของต้นทางเสมอไป
- Timeout descriptor 20 วินาที และ CSV 60 วินาที ครั้งแรกหลังแคชหมดอาจช้า
- ดาวน์โหลดล้มเหลวหรือ CSV ไม่ตรงรูปแบบจะคืน array ว่าง ข้อผิดพลาดบางกรณีถูกบันทึกใน log
- API ใช้ `fetchRows()` ซึ่งแคชเฉพาะผลลัพธ์ไม่ว่าง
- Livewire ครอบ `fetchFreshRows()` ด้วย `Cache::remember()` จึงอาจแคชผลว่างจนหมดอายุด้วย
- ไม่มี scheduler ดาวน์โหลดอัตโนมัติ การอ่านต้นทางเกิดเมื่อมี request และไม่มีแคช
- ข้อมูลที่แสดงเก็บในแคช ไม่ได้ import ลง `disease_reports`

ล้างแคชของแอปเมื่อจำเป็น:

```powershell
php artisan cache:clear
```

คำสั่งนี้ล้างแคชทั้งหมด หากต้องการเฉพาะ FSVO ให้เรียกเมธอด `clearCache()` ของ `BlvAnimalHealthService` จากโค้ดดูแลระบบ

## แก้ไขดีไซน์และ Blade

ทุกกลุ่มหน้าโหลดธีมผ่าน `resources/views/components/theme-styles.blade.php` รวม Noto Sans Thai, Font Awesome, CSS เฮดเดอร์ และธีมหลัก

### เลย์เอาต์

| ไฟล์ใน `resources/views/` | ใช้กับ |
| --- | --- |
| `template/frontend/master.blade.php` | ประกาศ ฟอร์ม เกี่ยวกับ ติดต่อ และ auth บางหน้า |
| `template/backend/master.blade.php` | แดชบอร์ด/หน้าจัดการ |
| `layouts/app.blade.php` | โปรไฟล์และ `<x-app-layout>` |
| `layouts/guest.blade.php` | ความปลอดภัยและ `<x-guest-layout>` |
| `welcome.blade.php` | หน้าแรกที่มีโครง HTML ของตนเอง |

ไฟล์ใน `components/`, `profile/`, `livewire/` หลายไฟล์เป็นส่วนประกอบ รับธีมจากหน้าแม่ ไม่ต้องเพิ่ม `<html>` หรือ import CSS ซ้ำทุกไฟล์

### จุดแก้ไขที่พบบ่อย

| ต้องการแก้ | ไฟล์ |
| --- | --- |
| โลโก้ เมนู ปุ่มบัญชี | `resources/views/template/frontend/header.blade.php` |
| ขนาด/responsive เฮดเดอร์ | `public/asset/frontend/css/pet-header.css` |
| หน้าแรก | `resources/views/welcome.blade.php` |
| รูปแบนเนอร์ | `public/asset/frontend/images/back.png` |
| เลย์เอาต์หน้าแรก | `public/asset/frontend/css/pet-home.css` |
| สี ฟอนต์ ปุ่ม ฟอร์ม ตารางทั้งเว็บ | `public/asset/frontend/css/pet-theme.css` |
| เมนูหลังบ้าน | `resources/views/template/backend/sidebar.blade.php` |
| เฮดเดอร์หลังบ้าน | `resources/views/template/backend/header.blade.php` |
| JavaScript/ปลั๊กอินหลังบ้าน | `resources/views/template/backend/js.blade.php` |
| ฟอร์มลงประกาศ | `resources/views/report.blade.php` |
| ฟอร์ม CRUD ประกาศ | `resources/views/livewire/pet-report-crud.blade.php` |
| ปุ่ม/ช่องกรอก Jetstream | `resources/views/components/` |

`back.png` มีข้อความหัวเรื่องอยู่ในภาพแล้ว หน้าแรกซ่อนข้อความ HTML ชุดเดียวกันทางสายตาแต่คงไว้สำหรับเทคโนโลยีช่วยการเข้าถึง ปุ่มยังเป็น HTML ที่กดได้ หากเปลี่ยนเป็นภาพไม่มีข้อความต้องแก้ CSS/markup ให้แสดงข้อความใหม่ด้วย

CSS ใน `public/asset/` โหลดตรง ไม่ผ่าน Vite ส่วน `resources/css/app.css` และ `resources/js/app.js` ต้อง build หลังเพิ่ม Tailwind utilities ใน Blade ควร build ใหม่เพื่อให้ CSS มี class ที่ใช้

ฟอร์มหน้าบ้านใช้ class `ignore` กับ `<select>` เพื่อไม่ให้ Nice Select เดิมครอบช่อง ช่วยให้ตัวเลือกพื้นที่ที่โหลดภายหลังและ Livewire ใช้ native select ได้ตรงกัน

```powershell
php artisan view:clear
npm.cmd run build
php artisan view:cache
```

## การทดสอบ

### เตรียมฐานข้อมูลทดสอบแยก

หลาย tests ใช้ `RefreshDatabase` ซึ่งสร้างและรีเซ็ตตารางได้ ขณะที่ `phpunit.xml` ยังคอมเมนต์ SQLite ไว้ ควรสร้าง `.env.testing` ให้ใช้ฐานข้อมูลแยกก่อนรัน ไม่ใช้ฐานข้อมูลที่มีข้อมูลจริง

ตัวอย่าง SQLite ในหน่วยความจำ ต้องมี PHP extension `pdo_sqlite`:

```dotenv
APP_ENV=testing
APP_KEY=<APP_KEY ของสภาพแวดล้อมทดสอบ>
APP_DEBUG=true
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
CACHE_DRIVER=array
SESSION_DRIVER=array
MAIL_MAILER=array
QUEUE_CONNECTION=sync
```

หรือใช้ MySQL database เฉพาะทดสอบ เช่น `pet_finder_testing` และบัญชีที่เข้าถึงเฉพาะฐานข้อมูลนั้น

```powershell
php artisan config:clear
php artisan test
php artisan test --filter=ProfileInformationTest
```

`tests/Feature/ProfileInformationTest.php` ตรวจว่าชื่อ/อีเมลเดิมโหลดเข้า Livewire และอัปเดตกลับลงฐานข้อมูลได้

มี tests ของ login, registration, password reset/confirmation, profile, password update, 2FA, browser sessions, account deletion และ API token บางส่วน ฟีเจอร์ที่ปิดอาจมีเงื่อนไขข้าม tests จึงต้องอ่านผลการรันจริง ยังไม่ควรถือว่าครอบคลุม CRUD ประกาศ รูป สิทธิ์หลังบ้าน และ FSVO ครบทุกกรณี

### ตรวจหลังติดตั้งหรือแก้ระบบ

```powershell
php artisan migrate:status
php artisan route:list
php artisan view:cache
npm.cmd run build
```

ตรวจด้วยตนเองเพิ่มเติม:

- เปิดหน้าแรก รายการ login/register ได้ทั้งคอมพิวเตอร์และมือถือ
- ค้นหา กรอง เปลี่ยนหน้าแล้วตัวกรองยังอยู่
- ลงประกาศและดูประกาศตนเองได้
- รูปเปิดจาก `/storage/pet-reports/...` ได้
- เปลี่ยนเป็น `closed` แล้วหายจากหน้าสาธารณะ แต่ยังอยู่ในรายการเจ้าของ
- รีเซ็ตรหัสผ่านส่งผ่าน mail driver ที่ตั้งไว้
- เมนูมือถือ dropdown และ Livewire ทำงานโดยไม่มี JavaScript error
- หน้าสถิติแสดงข้อมูลหรือสถานะว่างเมื่อบริการต้นทางไม่พร้อม

Blade compile/build ผ่านไม่ได้ยืนยันว่าการใช้งาน การอนุญาต และบริการภายนอกผ่านครบทุกกรณี

## แก้ปัญหาที่พบบ่อย

| อาการ | สิ่งที่ควรตรวจ |
| --- | --- |
| `could not find driver` | PHP extension ฐานข้อมูล และ PHP ที่ CLI/เว็บใช้งาน |
| `Unknown database` / ต่อ DB ไม่ได้ | เปิด MySQL สร้าง DB และตรวจ `DB_*` |
| ไม่มีตาราง `sessions` | รัน migrations เพราะใช้ database sessions |
| `Vite manifest not found` | `npm.cmd ci` แล้ว `npm.cmd run build` |
| assets ชี้ Vite ที่ไม่ได้เปิด | ตรวจ `public/hot` ที่ค้าง และเลือก dev server/build ให้ตรงกัน |
| รูป 404 | ตรวจ `storage:link`, path, `APP_URL`, document root |
| symbolic link ไม่ได้บน Windows | ตรวจสิทธิ์/Developer Mode แล้วรัน `storage:link` ใหม่ |
| รูปเล็กกว่า 5 MB แต่อัปโหลดไม่ผ่าน | ตรวจ MIME, `upload_max_filesize`, `post_max_size` และสิทธิ์ storage |
| `419 Page Expired` | CSRF, session, cookie และโดเมนที่เปิดเว็บ |
| แก้ `.env` ไม่เปลี่ยน | `php artisan config:clear` |
| แก้ Blade แล้วยังหน้าเดิม | `php artisan view:clear` และ refresh cache เบราว์เซอร์ |
| จังหวัดไม่โหลด | Network ไป `raw.githubusercontent.com`; พิมพ์สถานที่เองได้ |
| สถิติไม่แสดง/ช้า | อินเทอร์เน็ต ใบรับรอง HTTPS log และแคช FSVO |
| `npm.ps1 cannot be loaded` | ใช้ `npm.cmd` บน PowerShell |
| `/api/user` ได้ `401` | credentials ที่ Sanctum รองรับ; cookie SPA ยังไม่ได้ตั้งให้ใช้โดยอัตโนมัติ |
| วันในกราฟคลาดกับไทย | ตรวจ timezone; ค่าเดิมใน `config/app.php` เป็น `UTC` |

Log เมื่อใช้ file logging อยู่ที่ `storage/logs/laravel.log` ไม่ควรใส่รหัสผ่านหรือ token ลง log/เอกสาร

## ข้อจำกัดและแนวทางพัฒนาต่อ

1. **แยกสิทธิ์ผู้ดูแล:** routes หลังบ้านและ Livewire CRUD ยังไม่มี policy/role checks ควรเพิ่มทั้งสองชั้นก่อนใช้กับผู้ใช้หลายกลุ่ม
2. **Validate สมาชิกหลังบ้าน:** `Addusertable`/`Editusertable` ยังไม่ validate ฝั่งเซิร์ฟเวอร์ครบเหมือนสมัครสมาชิก ควรตรวจอีเมลซ้ำ ความยาว และรหัสผ่าน
3. **ลบรูปเมื่อลบบัญชี:** cascade ลบแถวประกาศ แต่ไม่ได้ cleanup รูปทั้งหมดบน disk
4. **ข้อมูลติดต่อ:** public API/หน้าเว็บแสดงชื่อและเบอร์ ควรกำหนดนโยบายการแสดงและการยินยอม
5. **API pagination:** เพิ่ม validation และขนาดสูงสุดของ `per_page`
6. **ข้อมูลสถิติ:** parser จำกัด 20,000 แถว และแยก CSV ตามบรรทัด ควรทดสอบกรณี field มี newline ภายในและข้อมูลขนาดใหญ่
7. **ฟีเจอร์ต่อยอด:** ติดต่อจริง รายละเอียดรายตัว หลายรูป แผนที่ แจ้งเตือน และประวัติการส่งคืน
8. **โค้ดเก่า:** มี `DiseaseReport`, `DiseaseReportCrud`, `Editor` แต่ไม่ผูกเป็นฟีเจอร์ใน `routes/web.php` ปัจจุบัน บางไฟล์อ้างตาราง/view เดิมที่ถอดแล้ว ต้องตรวจ dependency ก่อนนำกลับมาใช้
9. **Tests โดเมนประกาศ:** เพิ่มการลงประกาศ ตัวกรอง สิทธิ์เจ้าของ สถานะปิด รูป และ mock บริการภายนอก
10. **เปิดใช้งานจริง:** ตั้ง `APP_DEBUG=false`, environment, HTTPS, อีเมล สิทธิ์ไฟล์ และการสำรอง DB/รูป ให้ตรงระบบ โดยเฉพาะสิทธิ์หลังบ้านที่ยังไม่แยกในโค้ดนี้

`composer.json` ระบุ license `MIT` สำหรับโปรเจกต์ที่เริ่มจาก Laravel ส่วนรูป ฟอนต์ และ template assets ควรตรวจเงื่อนไขต้นทางก่อนเผยแพร่หรือใช้เชิงพาณิชย์
