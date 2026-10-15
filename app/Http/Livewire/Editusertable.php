<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Editusertable extends Component
{
    public $idd, $name, $email, $password;

    public function updateuser()
    {
        // อัปเดตชื่อ/อีเมลเสมอ ส่วนรหัสเปลี่ยนเฉพาะเมื่อกรอกใหม่ (แฮชก่อนบันทึก)
        $data = [
            "name" => $this->name,
            "email" => $this->email,
        ];
        if (!empty($this->password)) {
            $data["password"] = bcrypt($this->password);
        }
        User::where("id", $this->idd)->update($data);
        return redirect()->to(route('users'));
    }

    public function mount(int $id)
    {
        $user = User::findOrFail($id);
        $this->idd = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = ''; // เว้นว่างไว้ ไม่โชว์แฮชเดิม
    }
    public function render()
    {
        return view('livewire.editusertable');
    }
}
