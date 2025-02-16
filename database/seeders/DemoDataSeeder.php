<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\ExamType;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\AccountStudentFee;
use App\Models\EmployeeAttendance;
use App\Models\AccountEmployeeSalary;

class DemoDataSeeder extends Seeder
{
    public function run()
    {
        // Create demo years
        StudentYear::create(['name' => '2027']);
        StudentYear::create(['name' => '2028']);

        // Create demo classes
        StudentClass::create(['name' => 'Class 11']);
        StudentClass::create(['name' => 'Class 22']);

        // Create demo exam types
        ExamType::create(['name' => 'Mid Term new']);
        ExamType::create(['name' => 'Final new']);

        // Create demo fee categories
        FeeCategory::create(['name' => 'Tuition']);
        FeeCategory::create(['name' => 'Exam new']);

        // Create demo fee category amounts
        FeeCategoryAmount::create(['fee_category_id' => 111, 'class_id' => 1, 'amount' => 1000]);
        FeeCategoryAmount::create(['fee_category_id' => 222, 'class_id' => 1, 'amount' => 500]);

        // Create demo students
        $student1 = User::create(['name' => 'John Doe', 'email' => 'john@example.com', 'password' => bcrypt('password'), 'role' => 'student']);
        $student2 = User::create(['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => bcrypt('password'), 'role' => 'student']);

        // Assign students to classes and years
        AssignStudent::create(['student_id' => $student1->id, 'year_id' => 1, 'class_id' => 1]);
        AssignStudent::create(['student_id' => $student2->id, 'year_id' => 1, 'class_id' => 1]);

        // Create demo discount students
        DiscountStudent::create(['assign_student_id' => 1, 'discount' => 10]);
        DiscountStudent::create(['assign_student_id' => 2, 'discount' => 15]);

        // Create demo employee attendance
        EmployeeAttendance::create(['employee_id' => 1, 'date' => '2023-01-01', 'attend_status' => 'Present']);
        EmployeeAttendance::create(['employee_id' => 1, 'date' => '2023-01-02', 'attend_status' => 'Absent']);

        // Create demo account student fees
        AccountStudentFee::create(['student_id' => 1, 'year_id' => 1, 'class_id' => 1, 'fee_category_id' => 1, 'date' => '2023-01', 'amount' => 900]);
        AccountStudentFee::create(['student_id' => 2, 'year_id' => 1, 'class_id' => 1, 'fee_category_id' => 1, 'date' => '2023-01', 'amount' => 850]);

        // Create demo account employee salaries
        AccountEmployeeSalary::create(['employee_id' => 1, 'date' => '2023-01', 'amount' => 2000]);
    }
}
