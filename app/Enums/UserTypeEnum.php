<?php

namespace App\Enums;

enum UserTypeEnum
{
    public static function getUserTypes(): array
    {
        return [
            // 'teacher' => 'Teacher',
            'student' => 'Student',
            'parent' => 'Parent'
        ];
    }
}
