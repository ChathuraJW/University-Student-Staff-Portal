<?php



class AttendanceInstance{
    // attribute of AttendanceInstance
    private int $entryID;
    private  string  $description;
    private  string  $date;
    private int $week;
    private bool $attendance;
    private String $uploadedTime;

    // method of AttendanceInstance

    public function getEntryID()
    {
        return $this->entryID;
    }

    public function getDescription()
    {
        return $this->description;
    }


    public function getDate()
    {
        return $this->date;
    }

    public function getWeek()
    {
        return $this->week;
    }

    public function getAttendance()
    {
        return $this->attendance;
    }

    public function getUploadedTime()
    {
        return $this->uploadedTime;
    }

    public function setAttendance($attendance,$week,$date,$description,$uploadTime){
        $this->attendance = $attendance;
        $this->week = $week;
        $this->date = $date;
        $this->description = $description;
        $this->uploadedTime = $uploadTime;
    }


}
class courseModule{
    // attributes of courseModule
    private $CourseCode;
    private $name;
    private $creditVale;
    private $description;
    // methods of courseModeule
    protected function createModule(){

    }
    protected function editModule(){

    }
    protected function removeModule(){

    }
}
class EnrollFor{
    // attributes of EnrollFor
    private $indexNo;
    private $courseCode;
    private $courseName;
    private $dailyAttendance;
    private $percentage;
    // methods of EnrollFor
    protected function calculatePercentage(){

    }
    protected function addDate(){

    }
    protected function viewAttendance(){

    }
}