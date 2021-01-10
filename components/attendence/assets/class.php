<?php



class AttendanceInstance{
    // attribute of AttendanceInstance
    private int $entryID;
    private  string  $description;
    private  string  $date;
    private int $week;
    private bool $attendance;
    private String $uploadedTime;
    private int $enrollmentId;

    // method of AttendanceInstance

    public function getEntryID(){
        return $this->entryID;
    }

    public function getDescription(){
        return $this->description;
    }


    public function getDate(){
        return $this->date;
    }

    public function getWeek(){
        return $this->week;
    }

    public function getAttendance(){
        return $this->attendance;
    }

    public function getUploadedTime(){
        return $this->uploadedTime;
    }
    public function getEnrollmentId(){
        return $this->enrollmentId;
    }

    public function setAttendance($attendance,$week,$date,$description,$enrollmentId){
        $this->attendance = $attendance;
        $this->week = $week;
        $this->date = $date;
        $this->description = $description;
        $this->enrollmentId = $enrollmentId;
        return $this;
    }


}
class CourseModule {
    // attributes of courseModule
    private string $CourseCode;
    private string $name;
    private int $creditVale;
    private int $semester;
    private string $description;

    public function createCourseModule($courseCode, $name, $creditValue, $semester, $description): CourseModule {
        $this->CourseCode = $courseCode;
        $this->name = $name;
        $this->creditVale = $creditValue;
        $this->semester = $semester;
        $this->description = $description;
        return $this;
    }

    public function getCourseCode(): string {
        return $this->CourseCode;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCreditVale(): int {
        return $this->creditVale;
    }

    public function getSemester(): int {
        return $this->semester;
    }

    public function getDescription(): string {
        return $this->description;
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

class AttendanceInquiry{
    //attributes of enrollment
    private string $sentBy;
    private string $message;
    private string $date;
    private int $isViewed;

    //methods for enrollment
    public function setInquiryDetails($sentBy, $message, $date, $isViewed){
        $this->sentBy = $sentBy;
        $this->message = $message;
        $this->date = $date;
        $this->isViewed = $isViewed;
        return $this;
    }

    public function getSentBy(): string
    {
        return $this->sentBy;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getDate(): string
    {
        return $this->date;
    }


    public function isViewed(): bool
    {
        return $this->isViewed;
    }


}

class enrollment{
    //attributes of enrollment
    private int $enrollmentID;
    private int $studentIndexNo;
    private string $courseCode;
    private string $attempt;
    private string $enrollDate;

    //methods for enrollment
    public function setEnrollmentDetails($enrollmentId,  $studentIndexNo,$courseCode,$attempt,$enrollDate){
        $this->enrollmentID;
        $this->studentIndexNo;
        $this->courseCode;
        $this->attempt;
        $this->enrollDate;
        return $this;
    }

    public function getEnrollmentID(): int
    {
        return $this->enrollmentID;
    }

    public function getStudentIndexNo(): int
    {
        return $this->studentIndexNo;
    }

    public function getCourseCode(): string
    {
        return $this->courseCode;
    }

    public function getAttempt(): string
    {
        return $this->attempt;
    }

    public function getEnrollDate(): string
    {
        return $this->enrollDate;
    }


}