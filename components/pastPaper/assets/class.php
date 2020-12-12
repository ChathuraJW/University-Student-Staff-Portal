<?php

class PastPaper{
    // attributes of Pastpapers
    private $paperID;
    private $examinationYear;
    private $year;
    private $semester;
    private $subjectName;
    private $subjectCode;


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

}

