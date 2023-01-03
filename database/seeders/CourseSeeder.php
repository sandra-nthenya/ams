<?php

namespace Database\Seeders;

use \App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diplomaCourses = [
            "Diploma in Business Creation and Entrepreneurship",
            "Diploma in Journalism and New Media",
            "Diploma in Procurement",
            "Diploma in International Relations",
            "Diploma in Business Management",
            "Diploma in Business Information Technology",
        ];
        foreach($diplomaCourses as $course) {
            Course::create([
                'name' => $course,
                'level' => 'diploma',
            ]);
        }

        $underGraduateCourses = [
            "Bachelor of Commerce",
            "Bachelor of Tourism Management",
            "Bachelor of Science in Hospitality and Hotel Management",
            "Bachelor of Business Science: Financial Engineering",
            "Bachelor of Business Science: Financial Economics",
            "Bachelor of Business Science: Actuarial Science",
            "Bachelor Of Science In Informatics And Computer Science",
            "Bachelor Of Business Information Technology",
            "Bachelor of Science in Computer Networks and Cyber Security (BSc. CNS)",
            "Bachelor of Laws",
            "Bachelor of Arts in Communication (Journalism and Public Relations / Journalism and Development Communication)",
            "Bachelor of Arts in International Studies",
            "Bachelor of Arts in Development Studies and Philosophy",
            "Bachelor of Science in Supply Chain and Operations Management",
            "Bachelor of Financial Services",
            "Bachelor Of Science In Electrical and Electronics Engineering",
            "Bachelor of Business Administration and Hospitality Management",
        ];
        foreach($underGraduateCourses as $course) {
            Course::create([
                'name' => $course,
                'level' => 'undergraduate',
            ]);
        }

        $graduateCourses = [
            "Master of Science in Computing and Information Systems (MSc CIS)",
            "Master of Science in Information Technology (MSc.IT)",
            "Master of Science in Statistical Science",
            "Master of Science in Mathematical Finance and Risk Analytics",
            "Master of Science in Biomathematics",
            "Master of Applied Philosophy and Ethics (MAPE)",
            "Master of Science in Education Management (MSc.EM)",
            "Master of Commerce (MCOM)",
            "Master of Laws",
            "Master of Science in Information Systems Security (Msc ISS)",
            "Master of Management in Agribusiness",
            "Master’s in Public Policy and Management",
            "Master of Science in Development Finance",
            "MBA – Healthcare Management",
            "MBA for Executives",
            "Master in Hospitality Business Management (MHBM)",
            "Master of Science in Data Science and Analytics (MSc DSA)",
            "Master of Science in Sustainable Energy Transitions (MSc. SET)",
            "Master of Arts in Diplomacy, Intelligence and Security Studies (MDIS)",
        ];
        foreach($graduateCourses as $course) {
            Course::create([
                'name' => $course,
                'level' => 'graduate',
            ]);
        }
    }
}
