<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'title' => 'Web Development Basics',
                'description' => 'Learn HTML, CSS, and JavaScript fundamentals in this introductory course for aspiring developers.',
                'price' => 1999.99,
                'duration' => '8 weeks',
                'level' => 'Beginner',
                'topics' => json_encode([
                    'HTML Basics',
                    'CSS Styling',
                    'JavaScript Introduction',
                    'Responsive Web Design',
                    'Basic Web Hosting'
                ]),
                'instructor' => 'Amit Sharma',
                'schedule' => 'Monday and Wednesday, 7:00 PM - 9:00 PM',
                'requirements' => json_encode([
                    'Basic computer knowledge',
                    'Laptop with internet connection',
                    'Text editor (VS Code recommended)'
                ]),
                'image' => 'web-development-basics.jpg',
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Advanced Data Science with Python',
                'description' => 'In this advanced course, you will master data analysis, machine learning, and data visualization using Python.',
                'price' => 4999.99,
                'duration' => '12 weeks',
                'level' => 'Advanced',
                'topics' => json_encode([
                    'Python Basics for Data Science',
                    'Data Visualization (Matplotlib)',
                    'Pandas for Data Analysis',
                    'Machine Learning Algorithms',
                    'Deep Learning with TensorFlow'
                ]),
                'instructor' => 'Suman Gupta',
                'schedule' => 'Tuesday and Thursday, 8:00 PM - 10:00 PM',
                'requirements' => json_encode([
                    'Strong knowledge of Python',
                    'Laptop with Python installed',
                    'Basic understanding of statistics'
                ]),
                'image' => 'data-science-python.jpg',
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Introduction to Machine Learning',
                'description' => 'Learn the basics of machine learning algorithms and build your first ML model using Python.',
                'price' => 3499.99,
                'duration' => '10 weeks',
                'level' => 'Intermediate',
                'topics' => json_encode([
                    'Supervised Learning',
                    'Unsupervised Learning',
                    'Model Evaluation Techniques',
                    'Hands-on with scikit-learn',
                    'Data Preprocessing'
                ]),
                'instructor' => 'Priya Singh',
                'schedule' => 'Monday and Friday, 6:00 PM - 8:00 PM',
                'requirements' => json_encode([
                    'Basic Python knowledge',
                    'Laptop with Python and libraries installed',
                    'Understanding of basic statistics'
                ]),
                'image' => 'machine-learning-intro.jpg',
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Full Stack Development Bootcamp',
                'description' => 'Become a full stack developer by mastering both front-end and back-end development technologies.',
                'price' => 7999.99,
                'duration' => '16 weeks',
                'level' => 'Advanced',
                'topics' => json_encode([
                    'Frontend Development with React',
                    'Backend Development with Node.js',
                    'Database with MongoDB',
                    'Authentication and Authorization',
                    'Deploying Full Stack Applications'
                ]),
                'instructor' => 'Rajesh Kumar',
                'schedule' => 'Saturday and Sunday, 3:00 PM - 6:00 PM',
                'requirements' => json_encode([
                    'Prior knowledge of JavaScript',
                    'Laptop with Node.js and MongoDB installed',
                    'Basic understanding of web development'
                ]),
                'image' => 'full-stack-bootcamp.jpg',
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Android App Development with Kotlin',
                'description' => 'Master Android app development using Kotlin, and create your own apps for Android devices.',
                'price' => 4499.99,
                'duration' => '12 weeks',
                'level' => 'Intermediate',
                'topics' => json_encode([
                    'Kotlin Basics',
                    'Android Studio Setup',
                    'Building UI with XML',
                    'Working with APIs',
                    'Debugging Android Apps'
                ]),
                'instructor' => 'Neha Verma',
                'schedule' => 'Monday and Wednesday, 5:00 PM - 7:00 PM',
                'requirements' => json_encode([
                    'Basic knowledge of Java or Kotlin',
                    'Laptop with Android Studio installed',
                    'Understanding of OOP concepts'
                ]),
                'image' => 'android-development-kotlin.jpg',
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cloud Computing with AWS',
                'description' => 'Learn how to use Amazon Web Services (AWS) for hosting and scaling applications in the cloud.',
                'price' => 5999.99,
                'duration' => '10 weeks',
                'level' => 'Intermediate',
                'topics' => json_encode([
                    'Introduction to Cloud Computing',
                    'AWS EC2 Setup',
                    'AWS S3 for Storage',
                    'AWS Lambda for Serverless Computing',
                    'Deploying Applications on AWS'
                ]),
                'instructor' => 'Amit Yadav',
                'schedule' => 'Tuesday and Thursday, 9:00 PM - 11:00 PM',
                'requirements' => json_encode([
                    'Basic understanding of cloud services',
                    'Laptop with internet connection',
                    'Basic Linux command knowledge'
                ]),
                'image' => 'cloud-computing-aws.jpg',
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ethical Hacking & Cybersecurity',
                'description' => 'Become a certified ethical hacker and learn how to secure systems and networks.',
                'price' => 6999.99,
                'duration' => '14 weeks',
                'level' => 'Advanced',
                'topics' => json_encode([
                    'Introduction to Ethical Hacking',
                    'Penetration Testing Techniques',
                    'Network Security',
                    'Social Engineering Attacks',
                    'Securing Web Applications'
                ]),
                'instructor' => 'Ravi Sharma',
                'schedule' => 'Friday and Saturday, 4:00 PM - 7:00 PM',
                'requirements' => json_encode([
                    'Basic knowledge of networking',
                    'Laptop with Kali Linux installed',
                    'Understanding of security concepts'
                ]),
                'image' => 'ethical-hacking-cybersecurity.jpg',
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Digital Marketing Masterclass',
                'description' => 'Become a digital marketing expert and learn SEO, content marketing, and social media marketing.',
                'price' => 3599.99,
                'duration' => '10 weeks',
                'level' => 'Intermediate',
                'topics' => json_encode([
                    'SEO Basics',
                    'Content Marketing Strategy',
                    'Social Media Marketing',
                    'Google Ads and Analytics',
                    'Email Marketing'
                ]),
                'instructor' => 'Kavita Mishra',
                'schedule' => 'Monday and Thursday, 4:00 PM - 6:00 PM',
                'requirements' => json_encode([
                    'Basic understanding of online marketing',
                    'Laptop with internet connection',
                    'Familiarity with social media platforms'
                ]),
                'image' => 'digital-marketing-masterclass.jpg',
                'is_featured' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Game Development with Unity',
                'description' => 'Learn how to develop 2D and 3D games using Unity and C# programming.',
                'price' => 4999.99,
                'duration' => '12 weeks',
                'level' => 'Intermediate',
                'topics' => json_encode([
                    'Unity Setup and Basics',
                    'Game Physics and Logic',
                    'Creating 2D Games',
                    'Creating 3D Games',
                    'Publishing Games on Multiple Platforms'
                ]),
                'instructor' => 'Vikram Patel',
                'schedule' => 'Wednesday and Saturday, 2:00 PM - 4:00 PM',
                'requirements' => json_encode([
                    'Basic knowledge of C# programming',
                    'Laptop with Unity installed',
                    'Creative mindset for game design'
                ]),
                'image' => 'game-development-unity.jpg',
                'is_featured' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
