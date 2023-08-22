<?php

namespace App\Imports;

use App\Models\Student\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class StudentImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }


    public function model(array $row)
    {
       
       
        return new Student([
            //

            "student_unique_id" => $row[0],
            "roll_number" => $row[1],
            "name" => $row[2],
            "father_name" => $row[3],
            "mother_name" => $row[4],
            "parent_phone" => $row[5],
            "student_phone" => $row[6],
            "class_id" => $row[7],
            "group_id" => $row[8],
            "session_id" => $row[9],
            "section_id" => $row[10],
            "gender" => $row[11],
            "religion" => $row[12],
            "blood_group" => $row[13],
            "date_of_birth" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[14]),
            "birth_certificate_number" => $row[15],
            "photo" => 'no_image.jpg',
            "village" => $row[17],
            "post" => $row[18],
            "upozila" => $row[19],
            "district" => $row[20],
            "parmanent_village" => $row[21],
            "parmanent_post" => $row[22],
            "parmanent_upozila" => $row[23],
            "parmanent_district" => $row[24]
        ]);
    }
}
