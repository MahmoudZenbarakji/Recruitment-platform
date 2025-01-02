<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'salary_create',
            ],
            [
                'id'    => 18,
                'title' => 'salary_edit',
            ],
            [
                'id'    => 19,
                'title' => 'salary_show',
            ],
            [
                'id'    => 20,
                'title' => 'salary_delete',
            ],
            [
                'id'    => 21,
                'title' => 'salary_access',
            ],
            [
                'id'    => 22,
                'title' => 'job_type_create',
            ],
            [
                'id'    => 23,
                'title' => 'job_type_edit',
            ],
            [
                'id'    => 24,
                'title' => 'job_type_show',
            ],
            [
                'id'    => 25,
                'title' => 'job_type_delete',
            ],
            [
                'id'    => 26,
                'title' => 'job_type_access',
            ],
            [
                'id'    => 27,
                'title' => 'country_create',
            ],
            [
                'id'    => 28,
                'title' => 'country_edit',
            ],
            [
                'id'    => 29,
                'title' => 'country_show',
            ],
            [
                'id'    => 30,
                'title' => 'country_delete',
            ],
            [
                'id'    => 31,
                'title' => 'country_access',
            ],
            [
                'id'    => 32,
                'title' => 'city_create',
            ],
            [
                'id'    => 33,
                'title' => 'city_edit',
            ],
            [
                'id'    => 34,
                'title' => 'city_show',
            ],
            [
                'id'    => 35,
                'title' => 'city_delete',
            ],
            [
                'id'    => 36,
                'title' => 'city_access',
            ],
            [
                'id'    => 37,
                'title' => 'industry_create',
            ],
            [
                'id'    => 38,
                'title' => 'industry_edit',
            ],
            [
                'id'    => 39,
                'title' => 'industry_show',
            ],
            [
                'id'    => 40,
                'title' => 'industry_delete',
            ],
            [
                'id'    => 41,
                'title' => 'industry_access',
            ],
            [
                'id'    => 42,
                'title' => 'company_create',
            ],
            [
                'id'    => 43,
                'title' => 'company_edit',
            ],
            [
                'id'    => 44,
                'title' => 'company_show',
            ],
            [
                'id'    => 45,
                'title' => 'company_delete',
            ],
            [
                'id'    => 46,
                'title' => 'company_access',
            ],
            [
                'id'    => 47,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 48,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 49,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 50,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 51,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 52,
                'title' => 'payment_create',
            ],
            [
                'id'    => 53,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 54,
                'title' => 'payment_show',
            ],
            [
                'id'    => 55,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 56,
                'title' => 'payment_access',
            ],
            [
                'id'    => 57,
                'title' => 'chat_create',
            ],
            [
                'id'    => 58,
                'title' => 'chat_edit',
            ],
            [
                'id'    => 59,
                'title' => 'chat_show',
            ],
            [
                'id'    => 60,
                'title' => 'chat_delete',
            ],
            [
                'id'    => 61,
                'title' => 'chat_access',
            ],
            [
                'id'    => 62,
                'title' => 'notification_create',
            ],
            [
                'id'    => 63,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 64,
                'title' => 'notification_show',
            ],
            [
                'id'    => 65,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 66,
                'title' => 'notification_access',
            ],
            [
                'id'    => 67,
                'title' => 'nationality_create',
            ],
            [
                'id'    => 68,
                'title' => 'nationality_edit',
            ],
            [
                'id'    => 69,
                'title' => 'nationality_show',
            ],
            [
                'id'    => 70,
                'title' => 'nationality_delete',
            ],
            [
                'id'    => 71,
                'title' => 'nationality_access',
            ],
            [
                'id'    => 72,
                'title' => 'setting_access',
            ],
            [
                'id'    => 73,
                'title' => 'cv_create',
            ],
            [
                'id'    => 74,
                'title' => 'cv_edit',
            ],
            [
                'id'    => 75,
                'title' => 'cv_show',
            ],
            [
                'id'    => 76,
                'title' => 'cv_delete',
            ],
            [
                'id'    => 77,
                'title' => 'cv_access',
            ],
            [
                'id'    => 78,
                'title' => 'job_create',
            ],
            [
                'id'    => 79,
                'title' => 'job_edit',
            ],
            [
                'id'    => 80,
                'title' => 'job_show',
            ],
            [
                'id'    => 81,
                'title' => 'job_delete',
            ],
            [
                'id'    => 82,
                'title' => 'job_access',
            ],
            [
                'id'    => 83,
                'title' => 'skil_create',
            ],
            [
                'id'    => 84,
                'title' => 'skil_edit',
            ],
            [
                'id'    => 85,
                'title' => 'skil_show',
            ],
            [
                'id'    => 86,
                'title' => 'skil_delete',
            ],
            [
                'id'    => 87,
                'title' => 'skil_access',
            ],
            [
                'id'    => 88,
                'title' => 'applicatnt_create',
            ],
            [
                'id'    => 89,
                'title' => 'applicatnt_edit',
            ],
            [
                'id'    => 90,
                'title' => 'applicatnt_show',
            ],
            [
                'id'    => 91,
                'title' => 'applicatnt_delete',
            ],
            [
                'id'    => 92,
                'title' => 'applicatnt_access',
            ],
            [
                'id'    => 93,
                'title' => 'review_create',
            ],
            [
                'id'    => 94,
                'title' => 'review_edit',
            ],
            [
                'id'    => 95,
                'title' => 'review_show',
            ],
            [
                'id'    => 96,
                'title' => 'review_delete',
            ],
            [
                'id'    => 97,
                'title' => 'review_access',
            ],
            [
                'id'    => 98,
                'title' => 'finance_access',
            ],
            [
                'id'    => 99,
                'title' => 'job_seeker_access',
            ],
            [
                'id'    => 100,
                'title' => 'comapny_access',
            ],
            [
                'id'    => 101,
                'title' => 'application_create',
            ],
            [
                'id'    => 102,
                'title' => 'application_edit',
            ],
            [
                'id'    => 103,
                'title' => 'application_show',
            ],
            [
                'id'    => 104,
                'title' => 'application_delete',
            ],
            [
                'id'    => 105,
                'title' => 'application_access',
            ],
            [
                'id'    => 106,
                'title' => 'applications_job_access',
            ],
            [
                'id'    => 107,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
