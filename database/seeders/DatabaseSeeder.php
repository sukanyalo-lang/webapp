<?php

namespace Database\Seeders;

use App\Models\PetReport;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Demo data is intentionally local-only; never create demo accounts in production.
        if (! app()->environment('local') || PetReport::exists()) {
            return;
        }

        $owner = User::firstOrCreate(
            ['email' => 'demo@petfinder.local'],
            ['name' => 'Pet Finder Demo', 'password' => bcrypt('password'), 'email_verified_at' => now()]
        );

        $examples = [
            ['pet_name'=>'มะลิ','pet_type'=>'แมว','breed'=>'แมวไทย','color'=>'ขาว มีแต้มเทา','status'=>'lost','description'=>'แมวขาวแต้มเทา สวมปลอกคอสีฟ้า ค่อนข้างขี้กลัว','location'=>'อำเภอเมืองสุรินทร์ จังหวัดสุรินทร์','last_seen_at'=>now()->subDays(1)->toDateString(),'contact_name'=>'คุณมะลิ','contact_phone'=>'080-000-1001'],
            ['pet_name'=>'เจ้าถุงทอง','pet_type'=>'สุนัข','breed'=>'โกลเด้นรีทรีฟเวอร์','color'=>'ทอง','status'=>'found','description'=>'พบสุนัขเชื่อง มีปลอกคอแต่ไม่มีป้ายชื่อ','location'=>'ใกล้ตลาดสด อำเภอเมืองนครราชสีมา','last_seen_at'=>now()->subDays(2)->toDateString(),'contact_name'=>'คุณต้น','contact_phone'=>'080-000-1002'],
            ['pet_name'=>'โมจิ','pet_type'=>'กระต่าย','breed'=>'ฮอลแลนด์ลอป','color'=>'ขาวน้ำตาล','status'=>'lost','description'=>'กระต่ายตัวเล็ก หูตก มีปื้นสีน้ำตาลบริเวณหลัง','location'=>'ตำบลในเมือง จังหวัดบุรีรัมย์','last_seen_at'=>now()->subDays(3)->toDateString(),'contact_name'=>'คุณฟ้า','contact_phone'=>'080-000-1003'],
            ['pet_name'=>'จิ๋ว','pet_type'=>'นก','breed'=>'หงส์หยก','color'=>'ฟ้าเหลือง','status'=>'found','description'=>'พบนกหงส์หยกเกาะอยู่บริเวณระเบียงบ้าน','location'=>'อำเภอปากช่อง จังหวัดนครราชสีมา','last_seen_at'=>now()->toDateString(),'contact_name'=>'คุณพลอย','contact_phone'=>'080-000-1004'],
            ['pet_name'=>'ส้มจี๊ด','pet_type'=>'แมว','breed'=>'แมวบ้าน','color'=>'ส้มลาย','status'=>'lost','description'=>'หางมีปลายสีขาว ตอบสนองต่อชื่อส้มจี๊ด','location'=>'อำเภอท่าตูม จังหวัดสุรินทร์','last_seen_at'=>now()->subDays(4)->toDateString(),'contact_name'=>'คุณแอน','contact_phone'=>'080-000-1005'],
            ['pet_name'=>'โกโก้','pet_type'=>'สุนัข','breed'=>'ชิสุ','color'=>'น้ำตาลขาว','status'=>'found','description'=>'สุนัขขนยาว ตัดขนสั้น มีสายจูงติดอยู่','location'=>'อำเภอเมือง จังหวัดขอนแก่น','last_seen_at'=>now()->subDays(1)->toDateString(),'contact_name'=>'คุณบี','contact_phone'=>'080-000-1006'],
        ];

        foreach ($examples as $example) {
            PetReport::create(array_merge($example, ['user_id' => $owner->id]));
        }
    }
}
