<?php

class PastPaper{
    // attributes of Pastpapers
    private string $paperID;
    private string $examinationYear;
    private int $semester;
    private string $subjectName;
    private string $subjectCode;


    public function getPaperID()
    {
        return $this->paperID;
    }

    public function getExaminationYear()
    {
        return $this->examinationYear;
    }

    public function getYear()
    {
        return $this->year;
    }


    public function getSemester()
    {
        return $this->semester;
    }

    public function getSubjectName()
    {
        return $this->subjectName;
    }

    public function getSubjectCode()
    {
        return $this->subjectCode;
    }
    public function setPastPaper($paperID, $subjectCode, $yearOfExam, $semester){
        $this->paperID = $paperID;
        $this->examinationYear = $yearOfExam;
        $this->subjectCode = $subjectCode;
        $this->semester = $semester;
        return $this;
    }

}

class courseModule{
    // attributes of courseModule
    private string $CourseCode;
    private string $name;
    private string $creditVale;
    private string $description;
    private int $semester;
    // methods of courseModule

    public function setCourseModule($courseCode, $name, $semester){
        $this->$courseCode = $courseCode;
        $this->name = $name;
        $this->semester = $semester;
        return $this;
    }
}


