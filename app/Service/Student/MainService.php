<?php
namespace App\Service\Student;

use App\Models\Profile;

class MainService{
    public function updateProfile($data, $user_id, $id): Profile
    {
        $profile = Profile::where('id', $id)->update([
            'reg_number' => $data->reg_number,
            'phone_number' => $data->phone_number,
            'address' => $data->address,
            'sex' => $data->sex,
            'session_id' => $data->session_id,
            'faculty_id' => $data->faculty_id,
            'department_id' => $data->department_id,
            'user_id' => $user_id,
        ]);

        return $profile;
    }
}
