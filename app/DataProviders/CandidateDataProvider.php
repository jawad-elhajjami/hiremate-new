<?php

namespace App\DataProviders;

abstract class CandidateDataProvider
{
    public static function data(): array
    {
        return array(
            array('id' => '1','user_id' => '1','age' => '25','gender' => 'Male','skills' => 'Programming, Data Analysis','workExperience' => 'Software Engineer at XYZ Company','education' => 'Bachelor in Computer Science','curriculumVitae' => '/path/to/cv1.pdf','backgroundColor' => '#FFFFFF','textColor' => '#000000','fontFamily' => 'Arial','profilePicture' => '/path/to/profile_picture1.jpg','coverPicture' => '/path/to/cover_picture1.jpg','coverLetter' => 'I am passionate about technology...','jobPreferences' => 'Full-time, Remote','created_at' => '2023-12-22 14:40:43','updated_at' => '2023-12-22 14:40:43'),
            array('id' => '2','user_id' => '3','age' => '30','gender' => 'Female','skills' => 'Marketing, Social Media','workExperience' => 'Marketing Specialist at ABC Agency','education' => 'Master in Marketing','curriculumVitae' => '/path/to/cv2.pdf','backgroundColor' => '#EFEFEF','textColor' => '#333333','fontFamily' => 'Calibri','profilePicture' => '/path/to/profile_picture2.jpg','coverPicture' => '/path/to/cover_picture2.jpg','coverLetter' => 'Experienced in digital marketing...','jobPreferences' => 'Part-time, On-site','created_at' => '2023-12-22 14:45:20','updated_at' => '2023-12-22 14:45:20'),
            array('id' => '3','user_id' => '5','age' => '28','gender' => 'Male','skills' => 'Graphic Design, Illustration','workExperience' => 'Graphic Designer at Design Studio','education' => 'Bachelor in Fine Arts','curriculumVitae' => '/path/to/cv3.pdf','backgroundColor' => '#FFD700','textColor' => '#333333','fontFamily' => 'Times New Roman','profilePicture' => '/path/to/profile_picture3.jpg','coverPicture' => '/path/to/cover_picture3.jpg','coverLetter' => 'Passionate about visual storytelling...','jobPreferences' => 'Freelance, Remote','created_at' => '2023-12-22 14:50:15','updated_at' => '2023-12-22 14:50:15'),
            array('id' => '4','user_id' => '7','age' => '32','gender' => 'Male','skills' => 'Data Science, Machine Learning','workExperience' => 'Data Scientist at Tech Innovations','education' => 'Master in Computer Science','curriculumVitae' => '/path/to/cv4.pdf','backgroundColor' => '#C0C0C0','textColor' => '#000000','fontFamily' => 'Verdana','profilePicture' => '/path/to/profile_picture4.jpg','coverPicture' => '/path/to/cover_picture4.jpg','coverLetter' => 'Expert in predictive modeling...','jobPreferences' => 'Full-time, On-site','created_at' => '2023-12-22 14:55:10','updated_at' => '2023-12-22 14:55:10'),
            array('id' => '5','user_id' => '9','age' => '26','gender' => 'Female','skills' => 'Content Writing, Editing','workExperience' => 'Content Writer at Media Hub','education' => 'Bachelor in English Literature','curriculumVitae' => '/path/to/cv5.pdf','backgroundColor' => '#FFFF00','textColor' => '#333333','fontFamily' => 'Georgia','profilePicture' => '/path/to/profile_picture5.jpg','coverPicture' => '/path/to/cover_picture5.jpg','coverLetter' => 'Creative and detail-oriented writer...','jobPreferences' => 'Part-time, Remote','created_at' => '2023-12-22 15:00:05','updated_at' => '2023-12-22 15:00:05'),
            array('id' => '6','user_id' => '11','age' => '29','gender' => 'Male','skills' => 'UX/UI Design, Wireframing','workExperience' => 'UX/UI Designer at Design Agency','education' => 'Bachelor in Design','curriculumVitae' => '/path/to/cv6.pdf','backgroundColor' => '#FFA07A','textColor' => '#000000','fontFamily' => 'Helvetica','profilePicture' => '/path/to/profile_picture6.jpg','coverPicture' => '/path/to/cover_picture6.jpg','coverLetter' => 'Passionate about creating intuitive...','jobPreferences' => 'Full-time, On-site','created_at' => '2023-12-22 15:05:00','updated_at' => '2023-12-22 15:05:00'),
            array('id' => '7','user_id' => '13','age' => '31','gender' => 'Female','skills' => 'Financial Analysis, Investment','workExperience' => 'Financial Analyst at Finance Corp','education' => 'MBA in Finance','curriculumVitae' => '/path/to/cv7.pdf','backgroundColor' => '#00CED1','textColor' => '#333333','fontFamily' => 'Arial','profilePicture' => '/path/to/profile_picture7.jpg','coverPicture' => '/path/to/cover_picture7.jpg','coverLetter' => 'Analytical and detail-oriented...','jobPreferences' => 'Full-time, Remote','created_at' => '2023-12-22 15:09:55','updated_at' => '2023-12-22 15:09:55'),
            array('id' => '8','user_id' => '15','age' => '27','gender' => 'Male','skills' => 'Software Development, Testing','workExperience' => 'QA Engineer at Tech Solutions','education' => 'Bachelor in Computer Engineering','curriculumVitae' => '/path/to/cv8.pdf','backgroundColor' => '#800080','textColor' => '#FFFFFF','fontFamily' => 'Courier New','profilePicture' => '/path/to/profile_picture8.jpg','coverPicture' => '/path/to/cover_picture8.jpg','coverLetter' => 'Focused on ensuring software quality...','jobPreferences' => 'Part-time, On-site','created_at' => '2023-12-22 15:14:50','updated_at' => '2023-12-22 15:14:50'),
            array('id' => '9','user_id' => '17','age' => '34','gender' => 'Male','skills' => 'Project Management, Leadership','workExperience' => 'Project Manager at Tech Solutions','education' => 'MBA in Project Management','curriculumVitae' => '/path/to/cv9.pdf','backgroundColor' => '#008000','textColor' => '#FFFFFF','fontFamily' => 'Verdana','profilePicture' => '/path/to/profile_picture9.jpg','coverPicture' => '/path/to/cover_picture9.jpg','coverLetter' => 'Proven track record in leading teams...','jobPreferences' => 'Full-time, On-site','created_at' => '2023-12-22 15:19:45','updated_at' => '2023-12-22 15:19:45'),
            array('id' => '10','user_id' => '19','age' => '35','gender' => 'Male','skills' => 'Project Management, Leadership','workExperience' => 'Project Manager at Tech Solutions','education' => 'MBA in Project Management','curriculumVitae' => '/path/to/cv10.pdf','backgroundColor' => '#C0C0C0','textColor' => '#000000','fontFamily' => 'Verdana','profilePicture' => '/path/to/profile_picture10.jpg','coverPicture' => '/path/to/cover_picture10.jpg','coverLetter' => 'Proven track record in leading teams...','jobPreferences' => 'Full-time, On-site','created_at' => '2023-12-22 15:24:40','updated_at' => '2023-12-22 15:24:40')
          );
    }
}
