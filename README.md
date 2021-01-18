# Pet Projects
Projects that I made in my free time and to attach my skills. 

Currently I have 2 projects: Multilingual Website with PHP and Course Registration System built with Laravel

Multilingual Website currently has 3 supported languages: English, Russain and Turkish. This project hosted at http://tackleplagiarism.epizy.com/ 

Course Registration System is built using Laravel. I used Laravel libraries for Authentication Scaffolding, mainly Laratrust. https://github.com/santigarcor/laratrust

• Admin privileges: Can register, edit, delete students. Can create, edit, delete courses. Admin can see all courses
registered by a student

• User privileges: Can enroll for a course created by Admin. Can see history of enrolled courses. User can ONLY see
his/her enrollments, main information. User CAN NOT access Admin page. User CAN NOT register themselves,
only Admin can register new users

• Validations: Name, Email, Student ID, Password, Password confirmations are Required. Email must be unique.
Student ID has EXACTLY 9 digits, unique. Password is at least 6 symbols.
