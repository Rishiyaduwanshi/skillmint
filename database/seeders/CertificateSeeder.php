<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('certificates')->insert([
            [
                'student_id' => 2,
                'course_id' => 1,
                'percentage' => 85.50,
                'status' => 'Issued',
                'generated_by' => 1,
                'certificate_link' => 'https://example.com/certificates/1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 6,
                'course_id' => 6,
                'percentage' => 91.25,
                'status' => 'Issued',
                'generated_by' => 1,
                'certificate_link' => 'https://example.com/certificates/2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 10,
                'percentage' => 77.00,
                'status' => 'Issued',
                'generated_by' => 1,
                'certificate_link' => 'https://example.com/certificates/3',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
