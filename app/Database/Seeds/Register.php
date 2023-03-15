<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Register extends Seeder
{
    public function run()
    {
        $data = [
            [
                'first_name' => 'Ikram',
                'last_name'    => 'Khan',
                'gender'    =>1,
                'dob'    => '2002/01/01',
                'email'    => 'admin@gmail.com',
                'phone'    => '9785658334',
                'designation'    => 'Full-stack Web Developer',
                'password'    =>password_hash('admin', PASSWORD_BCRYPT),
                'confirm_pass'    =>password_hash('secret', PASSWORD_BCRYPT),
                'img_name'    => 'blank_profiles.jpg',
                'img_path'    => 'profile/blank_profile/blank_profiles.jpg',
                'user_type'    => 'admin',
                'created_at' =>date('Y-m-d'),
            ],
            [
                'first_name' => 'Ikram',
                'last_name'    => 'Khan',
                'gender'    =>1,
                'dob'    => '2002/01/01',
                'email'    => 'user@gmail.com',
                'phone'    => '9785658334',
                'designation'    => 'Web Developer',
                'password'    =>password_hash('admin', PASSWORD_BCRYPT),
                'confirm_pass'    =>password_hash('secret', PASSWORD_BCRYPT),
                'img_name'    => 'blank_profiles.jpg',
                'img_path'    => 'profile/blank_profile/blank_profiles.jpg',
                'user_type'    => 'user',
                'created_at' =>date('Y-m-d'),
            ],
        ];
        $this->db->table('signup')->insertBatch($data);
    }
}
