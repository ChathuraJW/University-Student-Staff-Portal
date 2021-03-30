<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student-Staff Portal</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/settingPage.css">
    <link rel="stylesheet" href="../assets/css/gridSystem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="bodyBackground text">

<!-- include header section -->
<?php require('../assets/php/basicLoader.php') ?>
<?php BasicLoader::loadHeader('../') ?>

<div class="featureBody" style="text-align: justify;">
    <div class="row col-1" style="padding: 24px;">
        <div class="heading">
            <h1 style="font-size: 56px;"><i class="fa fa-hands-helping"></i>USSP Help</h1>

            <br>
            <br>
            <p style="font-size: 20px;">
                H
            </p>
        </div>

        <div style="text-align: center; font-size: 18px">

            <a href="#adminPanel">Admin Panel</a> <br>

            <a href="#examSection">Exam Section</a><br>

            <a href="#contactUnion">Contact Union</a><br>

            <a href="#hallReservation">Hall Reservation</a><br>

            <a href="#assignmentManagement">Assignment Management</a><br>

            <a href="#meetingAppointment">Meeting Appointment Request</a><br>

            <a href="#workloadManagement">Workload Management</a><br>

            <a href="#timeTable">Timetable</a><br>

            <a href="#forgetPassword">Forget/Reset Password</a><br>

            <a href="#enrollCourse">Enroll For Course Module</a><br>

            <a href="#iqacReportManagement">IQAC Report Management</a><br>

            <a href="#trainSeasonManagement">Train Season Management</a><br>

            <a href="#message">User Message</a><br>

            <a href="#pastPaperManagement">Pastpaper Management</a><br>

            <a href="#attendanceManagement">Attendance Management</a><br>

            <a href="#notificationManagement">Notification Management</a><br>


        </div>
        <br><br><br>
        <div class="examSection" id="examSection">
            <b style="font-size: 24px;">Exam Section</b><br><br>
            <div id="resultClientTool" style="font-size: 18px;">
                <b style="text-decoration: underline;">Result client tool</b><br><br>
                Before using this as an academic staff user, you must log in to the client using, your username and password. At the same time, make
                sure to submit your private key as well.
                To have your private key navigate to setting on your USSP account setting, there have an option call generate public-private key pair,
                once you click it you will be able to download your private key file. Important, when you receive your private key make sure to keep
                it securely.
                At the same time, before clicking the login button, you must select the subject and the attempt. The attempt can be either the first
                attempt or a repeated attempt. Based on the result you are going to submit select that as well.
                Then you click the login button, you will be able to see all student (who enrolled for the selected course selected attempt) index
                numbers in a table and you can enter make for each student, in textboxes that placed in front of the index number of students.
                Once you complete then click generate file button, then you will be able to have a system-compatible result file.

            </div>
            <br><br>

            <div id="submitRawExamResultFile" style="font-size: 18px;">
                <b style="text-decoration: underline;">Submit raw exam result file</b><br><br>
                This feature is used to send exam results to the examination department. Before going to submit make sure to create a ussp formatted
                result file using the result client tool.
                Then you must fill the form carefully. Important things to notice are, there have two dropdowns to select examination for which years
                and which semester, when you select them correctly subject dropdown will show the only subject that belongs to your selection. If you
                were unable to find the subject, then click the refresh icon () next to the title subject. Then you can see the complete subject
                list.
                If you are going to submit the first attempt subject result, then you must select batch as well. But if you are going to submit
                repeated attempt results, then you unable to select the student batch.
                After filling the form and upload the result file, you able to click submit button to submit the result to the examination department.
                If the operation is successful you will be able to see a notification. About saying the operation is completed.
                If in case of operation frailer, you will be able to see a red color error message. You can understand what the error is happened by
                reading them.
                Important: you can submit fake files that have the extension of ussp. But once your file reaches to examination department, then
                unable to open and get the date. So, make sure to use the result cline to generate the result file.
                <br><br>
                <b>Error code details</b><br>
                #ERM01 – This error occurs if you submit an unsupported file as a result file. The only valid file format is the result
                client-generated ussp formatted file.
                #ERM02-D/F/I/U – This error occurs due to an internal system frailer. The only solution is to try again after few times.

            </div>
            <br><br>

            <div id="getRawExamResults" style="font-size: 18px;">
                <b style="text-decoration: underline;">Get raw exam results</b><br><br>
                To access this feature, the user should log in with the system and should have a “RED” role. This user role is assigned to
                administrative user login by the system administrator.
                Before all operations, one’s examination registrar got the account, must generate a public/private key pair for further process. For
                that refer, to the section setting section.
                Once you complete that you can collect result files that send by academic staff members.
                When the user login to the system, there has a feature called to get the raw result. Hear on the left-hand side all result submissions
                will be listed. You can click one of them, then on the right-hand side you can see the file description, as well as there has a button
                call unlock result. Once you click it system asks you to submit your private key that was generated before. You must copy the key and
                pate on the place it requests. After the validation, you will be able to see the result file.
                Now you can download the results as a pdf document. For that click, the button (📄) appears on the left bottom corner of the page.
                Then browser printing options will be open. As your need, you can print it out or save it as a pdf to the local drive.
                Important, once you collect the result file, keep in mind that to confirm that you were collected the result file. For that, there has
                a button call to confirm result received.
                <br><br>
                <b>Error code details</b><br>
                #ERM03-F – This error occurs if there have a frailer to load result submissions. The solution for that is to refresh the page several
                times to have proper output.
                #ERM04 – This error occurs when file collection confirmation frailer. You can try again to confirm is the solution for this error.
                #ERM08-PRI/PUB – This error occurs when key loading failed. You can try again to unlock the result file when this error occurs.
                #ERM09 – This error occurs when result file authenticity checking failed. The solution for this is to inform staff members to resubmit
                the result file.
                #ERM10 – This error occurs when result file integrity checking failed. Solution for this also same as the previous, resubmission is
                required.

            </div>
            <br><br>
            <div id="addResult" style="font-size: 18px;">
                <b style="text-decoration: underline;">Add result</b><br><br>
                This feature is accessible only for EDO privileged administrative login. USSP can have only one user with this privilege. This user is
                responsible to submit examination board confirmed results to the system. For that first need to create the result.
                To create a result file there have two major options.
                <br>
                1. Use CSV result clint.<br>
                2. Use MS Excel, like tool.<br><br>
                The header format is as below. <br>
                <b>Serial Number, Index Number, Result</b><br><br>
                The serial number is a number that incrementing one by one start from 1. Index Number is the student index number, result is the
                student obtained result.
                Example file,<br>
                Serial Number, Index Number, Result <br>
                1,18000133,A- <br>
                2,18004590,AB <br><br>
                Instead of using such a tool, you can use the ussp CSV client. To use this tool, first, you have to log in to it using ussp
                credentials, this can only use administrative user. As in result client, you must select which subject and which attempt. Then you
                will have an index list. Then complete the result information and click generate button. After few times you can collect the
                downloaded CSV file.
                With generated CSV file you can go to add result feature of USSP. Then complete the requested fields correctly, as in add raw result
                feature, if you are going to submit the first attempt result, then you must fill batch information as well.
                At the same time subject classification mentioned on the get raw result feature is valid to hear as well. <br>
                When you upload the result file, the system will show the content, you can validate the result again before submitting them. There
                have searching options, using that you can search index numbers and validate results. (If the uploaded file is not valid that will
                inform by the system as well.)
                Once you submit them by clicking upload result. You will be having and confirm messages, that information about operation successful.
                <br><br>

                <b>Error code details</b><br>
                #ERM05-F/T – This error occurs due to an internal system error. May course poorly formatted file submission. The solution is trying
                again after few times. Make sure that the result file is correctly formatted and should not have free lines at the end or begin or
                even in middle.
                #ERM06 – This also occurs due to internal system failures. The solution is trying again and make sure to check the correctness of each
                field on the form.

            </div>
            <br><br>
            <div id="viewExamResults" style="font-size: 18px;">
                <b style="text-decoration: underline;">View exam results</b><br><br>
                This feature can access only for student logins. In the home panel, there has a section call view result. Using that students can
                access this feature.
                In the interface, you can see, all examination results and result analysis as well. By looking at the interface, you can easily
                understand the parameters posting on there.
                There have two GPA values. <br>
                1. Degree GPA – This value is calculated based on the highest results obtained by the student for each subject. <br>
                2. Class GPA – This value is calculated based only on the first attempt result. <br><br>
                If students have repeated attempt subjects, then both GPA values can be different. (degree GPA > class GPA). But if students do not
                have repeated attempts both values are equal.
                Class GPA value is used to denote classes for students. If Class GPA is <br>
                 >= 3.7 => FC – First class <br>
                 >= 3.3 => SU – Second upper class <br>
                 >= 3.0 => SL - Second lower class <br><br>
                In the interface, there have been completed credit amounts and the batch rank as well. At the same time, there have several plots that
                show different analyzes of their results. <br><br>


                <b>Error Codes</b><br>
                #ERM07 – This error happens due to internal system failures. The solution for the error is to reload the web page.

            </div>
            <br><br>
        </div>

        <div class="contactUnion">
            <div id="contactUnion">
                <b style="font-size: 24px;">Contact Union</b><br><br>
                <div style="font-size: 18px;">
                    This feature can use for any user in the system, and it provides a facility to communicate with the student union. When the user
                    checks on home, there has a feature call contact student union. When a user accesses the facility, the left-hand side of the
                    interface shows the message history, and the right-hand side of the interface provides space to create and send a message to the
                    union.
                    Message can be either Sinhala, English, Tamil, or any other language. As well as, the user can speak to the union, with or without
                    identity. That means if the user needs to send a message anonymously to the union, this feature also there. <br>
                    There has a toggle switch with title call anonymous messages, when you turn it on, you will see that a spy sign with red color.
                    That is the indication of an anonymous message. However, if you need to send it with your name the switch needs to toggle the
                    other side. The green color signed document is the way to identify that the message is going to send with the name.
                    After completion of filling all fields. Then click send the message button to send it to the student union. When the operation
                    complete successfully, the system will inform that using a success message. Important to know that do not close or refresh the
                    page until alter will come, because that operation may take several times to complete. <br>
                    <br>
                    <b>Error Codes</b><br>
                    #SMU01-M – This error occurs due to the mail service frailer. The solution is to wait few times and try again to send it. <br>
                    #SMU01-D – This error also occurs due to an internal system flier. Try again after a few times would be the solution.
                </div>
            </div>
            <br><br>

        </div>

        <div class="hallReservation" id="hallReservation">
            <b style="font-size: 24px;">Hall Reservation Management</b><br><br>
            <div id="makeNewReservation" style="font-size: 18px;">
                <b style="text-decoration: underline;">Make a new reservation for a hall/lab</b><br><br>
                This facility is also accessible for all users in the system. On the home page, there has a feature call hall reservation. That is
                used to access this facility. When you come to the feature, the left-hand side of the page shows the previous reservation request.
                They are left margin color interpret the status of each request. The red color margin denotes rejected requests, Green for accepted
                requests, and blue color for pending requests. There has another type of request, they are time-out once, they denote by yellow color.
                There has a system administrator-defined period, to expire a reservation request, once the request expires it is no longer considered
                a valid/active request. <br><br>
                There has a wide button called go to allocation map under make a new booking request. When you click that button system will pop a
                dialog box having a table. This is the current allocation map of all lecture halls and computer labs in the university. You can select
                a date from the above text field. Based on that, the map will be colored and shows current allocations. By hover over numbers on the
                map, you can get details of that reservation.
                To exist allocation map, use the close(X) button placed on the top right corner of the window. <br><br>
                To create a new reservation request, you can fill and submit the form. Import, before you submit you need to fill all fields that ask
                for. When you fill the form make sure to provide the date and time correctly. You are unable to make reservations to past dates, to
                date always should be either from date or forward date to from date (Time also same negative time differences course to error.). Time
                away should be in-between 08:00 and 19:00. When you provide time make sure to keep zero seconds always, if not you unable to submit
                the request.
                Make sure to provide true information when you submit the form, if not that will also reason to reject your request because your
                request is reviewed and confirmed by senior staff members at the university. It is better to provide, good decryption about, what is
                the reason to do the allocation.
                After completing the application, you can send it to review by clicking send to review button. Be patient and wait few times to check
                whether the request is placed successfully because the system issues a message to inform you about it.
                It is better to carefully look allocation map before you are going to create/make a new reservation request. <br><br>


                <b>Error Codes</b><br>
                #HBM08 – This error occurs due to an internal system flier. Try again after few moments. <br>
                #HBM09 – This error occurs when the user is going to make a reservation for a slot that has already been occupied by another
                requester. The way to handle this error is, find another slot that does not have already occupied. <br>
                #HBM10 – This error occurs when the user is going to make a reservation request for a slot that has already been occupied by timetable
                entry. Handling this error is more towards like the previous error. Find another slot and make a new reservation request.
                <br>
                #HBM11 – This error occurs due to invalid date and time selections. So, make sure that the date-time field is filled correctly and
                according to rules.

            </div>
            <br><br>
            <div id="confirmBooking" style="font-size: 18px;">
                <b style="text-decoration: underline;">Confirm booking</b><br><br>
                USSP has three users by default, to handle/respond to hall/lab reservation requests. On their home page, have a feature call, confirm
                the hall booking feature. Once you go there, the left-hand side of the interface shows current active reservation requests.
                Once you click on one of them, it will open on the right-hand side of the interface. There show all details about the request. <br>
                If there have the same slot reservation request that is also listed on there as well. All the details related to those requests also
                shows in a table there. The table has a field call request ID, once you click on that you can navigate to that request as well.
                Important, once you open a reservation request, do not open another reservation request. If you want to open another request, do
                confirm the currently opened request, and then go for another or click the respond later button and open another request. If you do
                not follow those procedures, there have a high possibility to lock or discard the previously opened request.
                When you going to confirm, a request selects the request ID from the dropdown list and confirms the declaration, after click confirms
                reservation button to finish. Once you get the confirmation process is completed.
                When operating on the system, try to avoid request locking. If a lock happens you unable to respond to it at any time. <br><br>

                <b>Error Codes</b><br>
                #HBM01/02 – This error occurs when the system unable to load reservation requests. The solution for this error is to refresh the page.
                <br>
                #HBM03 – This error occurs when you are going open a request, that is already reviewed or under reviewing by another user. Hence you
                are unable to review it right now. Select another one for review. <br>
                #HBM05 – This error occurs when you click the respond later button and, that operation got failed situation. The solution is trying
                again. Keep on your mind, do not refresh the page. That will course for locking. <br>
                #HBM06 – This error occurs when you are going to confirm a reservation request. This happens due to the system frailer. Try again
                after few moments. Make sure that do not refresh the page. <br>
                #HBM07 – This error occurs when you forget to confirm the declaration. The solution is to confirm the declaration and do it again. Do
                not refresh the page in this situation as well. <br>

            </div>
            <br><br>


        </div>

        <div class="assignmentManagement" id="assignmentManagement">
            <b style="font-size: 24px;">Assignment Management</b><br><br>
            <div id="assignmentCreation" style="font-size: 18px;">
                <b style="text-decoration: underline;">Assignment creation and basics</b><br><br>
                This facility is accessible only for academic support staff. In the home, there have a feature call assignment management. Once you
                access this facility, the left-hand side of the interface shows, list of assignment panes, that were created by you or you are in.
                To create a new assignment plan, you need to fill the form that is on the right-hand side of the interface. First, you must select
                which year, which semester subject that you are going to create an assignment plan for. Once you select them, the subject dropdown
                will sort and list out only a few subjects. If you are unable to find the subject on the dropdown, click the refresh icon () next to
                the title subject.
                Assignment weight field value should be in-between 0 – 100. That means which percentage of weight is there for assignment from total
                grade. Next is the number of assignments, which is also a number greater than 1. If you do not care about those value ranges, there
                may have errors.
                When you select contributing academic support staff, select them one by one on the dropdown menu, then their username will append to
                the text area next to the dropdown. If you done a mistake, to correct them click the refresh icon () next to the title assignment
                plan conduct by.
                After that, you can click create new assignment plan button. <br><br>

                <b>Error Codes</b><br>
                #AOM01 – This error occurs when you are going to submit create a new assignment plan. The solution is to check whether all fields are
                correctly filled and then try again after few times. <br>
                #AOM02 - A/C/I/M/S – This error occurs due to the frailer of initial data loading. The solution for that is to refresh the page. <br>

            </div>
            <br><br>

            <div id="openAssignmentPlan" style="font-size: 18px;">
                <b style="text-decoration: underline;">Open assignment plan and inside operations</b><br><br>
                Once the user login to the system, the left-hand side of the interface shows current assignment plans as mention above. When you click
                on there, you are coming to the assignment operation page. There in the interface top left corner, you can see the information about
                the assignment plan. The left bottom corner shows the current assignment that belongs to the assignment plan.
                To create a new assignment on this plan you can click create new assignment button. Then you can see a form on the right-hand side.
                You can give a name, and description to the assignment. Then you have to add assignment weight, this value should be in-between 0-100.
                That means the weight percentage. Next, you have to select the type of assignment using the dropdown menu. After fill all of those
                fields. You can create the assignment. If you correctly fill all of them. Then you can see a success message pop by the system.
                All of the assignment belongs to the current assignment plan is listed bottom left corner of the interface. There in each assignment
                have three buttons to edit, open or delete a particular assignment. <br><br>
                To add marks to the assignment you can click the open button. Then the right-hand side of the interface shows assignment details and
                student index list, who enrolled for particular course module. Then simply select the student using the index number and then click
                the check box that belongs to a student to enable the text field. Once you add a student mark, click on the save button in-front of
                the text field. Then the result will be saved. That indicates by changing the color of the save button to green. Import, once you add
                marks into the text box, make sure to click the save button. As well as mark value should be in-between 0-100. Multiple users can add
                results/marks into the same assignment at the same time is another important facility that the system is provided.
                To edit assignment data, you can click the edit icon on assignment, then the edit section is open on the left-hand side of the
                interface. You can edit data as you want and click the save button to save the changes, which you did. Conditions that are used in
                creating of assignment is valid for the update section as well.
                If you want to delete an assignment, then click the delete icon on the assignment. System pop a message to ask again you want to
                delete it, if you click yes, the selected assignment will be deleted. <br><br>
                Important, make sure to create the same number of assignments that you mentioned when you create the assignment plan. The percentage
                sum of all assignments, in the selected assignment plan should be equal to 100 when you generate the final report. If both mentioned
                conditions do not satisfy, there have a high possibility to return the wrong report.
                To generate the report for the assignment plan, you can click generate report button that resides inside the assignment plan. Once you
                click that print option will pop, then you can save the report as a pdf or print it into paper.
                After all of them, you can close the assignment plan by clicking close assignment plan. Then system asks for confirmation, once you
                complete those steps. The assignment plan will be closed. That informs all staff participants by notifications and an email as well.
                <br><br>


                <b>Error Codes</b><br>
                #AOM03 – This error occurs when you are going to add a new assignment into the assignment plan. The solution for the error is to try
                again after several times. <br>
                #AOM04 – This error occurs when you are going to delete an assignment, from the assignment plan. The solution is to try again after
                several times. <br>
                #AOM05 – This error occurs when you are going to update assignment plan details. The solution is to check again your form data and try
                again. <br>
                #AOM06 – This error occurs due to user and make, that is out of range 0-100. The solution is bringing mark value into range and try
                again. <br>
                #AOM07 – This error occurred due to another user in add a mark to the same student. <br>
                #AOM08/09/10– This happens due to an internal system frailer, try again after a few times. Do not refresh the page. <br>

            </div>
            <br><br>


        </div>

        <div class="adminPanel" id="adminPanel">
            <b style="font-size: 24px;">Admin panel</b><br>
            <div style="font-size: 18px;">Admin user of the system is responsible to manage the entire USSP system. Admin panel is the place to
                configure everything, to operate the system smoothly. The user who has admin privilege can reach to admin panel using home.
            </div>
            <br><br>
            <div id="addUsers" style="font-size: 18px;">
                <b style="text-decoration: underline;">Add users to system</b><br><br>
                Using this section admin can add new users to the system. If the user is a student, first navigate to add student(bulk) under user
                management, then you need to create a CSV file including student list. When you create this list, use the template file gives in the
                system. As well as before add data to the template, you must read all instructions given on the page.
                Once you create a CSV file fit into conditions given, upload it to the place provided in the system. Then after selecting the
                student’s group code and click submit data button. If the operation is successful, you can see a success message popped by the system.
                In case if you need to add individual student data to the system. You have to follow the same steps mentioned above. <br><br>
                To add staff members to the system, you need to navigate to add staff(individual) under user management. There has a form, you need to
                fill it correctly and click the register button. If all fields are correctly filled, you will see a success message popped by the
                system.
                If there need to update user profile details, navigate to user profile update under user management. There has a search box to add the
                username and then click the search button. If a user is existing, you can see a set of fields, that come with editable permission,
                there you can update necessary details and then click the save data button. If the operation was completed without any errors, the
                system popped the success message.
                If a student needs to change their group, use the feature change student group under user management. Once you go there, there has a
                search option as previous, then after select student system will display a dropdown to select a new group (all group code description
                can interpret using the given table) for student, click change group button to complete the operation. If it happens successfully
                system is informed about it. <br><br>

            </div>
            <br><br>

            <div id="subjectManagement" style="font-size: 18px;">
                <b style="text-decoration: underline;">Subject management</b><br><br>
                This section is used to introduce new subjects, update subject details, and remove the old subject form system. Once you reach to
                subject management section; all subjects are listed there. At the end of each subject, there have two buttons for edit and delete. If
                you select the delete button, the system asks for verification and then delete it. If you select edit, the system gives the
                opportunity to edit the subject name, code, credit amount, semester, and subject description. There have submit button, to save all
                changes that you perform.
                To introduce a new subject to the system, click add new course button, then you can see a form, asking subject code, name, credit
                amount, semester, and description. After filling them you can click submit button to save them. Hear also the system popped a message
                if the operation is successful.
                Important, semester numbers can be an integer range 1 to 8 including margins. For example, the first-year first semester denotes by 1,
                second-year first semester denotes by 3.
                <br>
            </div>
            <br><br>

            <div id="facilityManagement" style="font-size: 18px;">
                <b style="text-decoration: underline;">Facility management</b><br><br>
                This section is used to manage lecture hall and computer lab details. As previously in subject management, all facility details are
                listed there. Edit or delete operation can be performed using the button placed at the end of each entry. If you are going to edit
                details of the selected facility, you have a chance to change, hall ID, capacity, and hall type. In the delete operation, facility
                details will be removed after asking for confirmation.
                To introduce new facility detail to the system, you can click add new facility button, once you click it, a set of details will ask by
                the system and simply you can add them to the system.
                <br>
            </div>
            <br><br>

            <div id="userPriviledge" style="font-size: 18px;">
                <b style="text-decoration: underline;">User privilege management</b><br><br>
                This section is used to attach special roles with system users. The interface shows currently each role assigned to users. And the
                description for each user role. Here you can select user role and newly assigned user, then the system checks user eligibility to the
                selected role, and the assignment process will complete. Once complete the operation; the system will inform by a success message.
                Important, you need to study the information given in the web interface well before operate.
                <br>
            </div>
            <br><br>

            <div id="studentFeature" style="font-size: 18px;">
                <b style="text-decoration: underline;">Student feature management</b><br><br>
                Under this section, the admin can add student details who are taking scholarships and who are in student hostels.
                Both of these features operate in the same manner. Before the operation, you need to create a student index number list for each need.
                If it is scholarship getting student information, you have to select scholarship type, it can be either mahapola, bursary, or other
                scholarship. After selecting it, you can add the student index number list that belongs to the selected scholarship. Then after you
                can click submit button to save those dates.
                In the hostel students situation, you have to add only the student index number list and click submit button. In both cases, if the
                operation is completed without errors you can see a success message.
                <br>
            </div>
            <br><br>

            <div id="timetableManagement" style="font-size: 18px;">
                <b style="text-decoration: underline;">Timetable management</b><br><br>
                This section is used to add, edit and delete timetable entries from the system. Once you reach the system; all student group
                information will be listed there. You can a student group that you need, by clicking it. Then interface list out all entries, that
                belongs to the selected group. You can edit them by clicking the edit button that appears at the end of each entry. Once you go to the
                edit section, you can change, the hall where it is held, subject, day, time, a description, like information.
                At the same time, you can delete timetable entries by clicking the delete button as well. <br><br>
                To add new timetable entries for the selected student group, click add new entry button. Then you can see a form asking for basic
                information about entry, then you can click submit button to save those data.
                If you want to see all entries for the selected group, click the view timetable button, then the table opened and shows entries there.
                <br>
            </div>
            <br><br>

            <div id="basicSystemConfig" style="font-size: 18px;">
                <b style="text-decoration: underline;">Basic system configurations</b><br>
                This feature provides the facility to change system parameters. In the interface, all parameter names are listed. You can change them,
                after enable editing by clicking the checkbox given for each feature. After you do change click edit selected to save. If the
                operation is completed, you can see a confirmation.
                Make sure that, do not keep empty any field after edit. <br><br>
                System email is used to send an email when necessary. Use the “donotreplay” email address for that. Password should also need to
                correct, otherwise, that will lead to most operation failures in the system.
                The current semester is a number that denotes the currently ongoing semester number.
                Validity hour parameter values should be an integer and they should be in an hour. That means if you need for 1 day, the value should
                be 24.
                <br>
            </div>
            <br><br>

            <div id="dangersZoon" style="font-size: 18px;">
                <b style="text-decoration: underline;">Dangers zoon activities</b><br><br>
                Under this section, there have two major sub-sections. The first one is, start a new semester. This operation should perform begging
                of each semester. Once you start a new semester, all current student enrollment will be deactivated, timetable entries will be
                deactivated. Student groups will be changed. Some student logins will be deactivated like dangers active happen. So before doing this
                make sure are you need to do that.
                Before the operation, you must provide a login credential to the system to validate you are an admin user. Then check the declaration.
                After that, you can click confirm and start the new semester button to start operation. Once it is completed you can see a success
                message. <br><br>
                The next major subsection is changed system admin user, for that also you must provide current admin credentials. Then select new
                admin user task is there for that use the right-hand side search facility. That will help to select users. When you add a username and
                click the search button, the system will check user feasibility to be an admin user. If the user is eligible, the system notifies it
                using a pop message. After selecting you can click confirm and transfer privilege button. At the end of this operation, you will be
                logout automatically from the system. That indicates the operation is successful.
                <br>
            </div>
            <br><br>

            <div id="studentEnrollCourse" style="font-size: 18px;">
                <b style="text-decoration: underline;">Students enroll for course</b><br><br>
                This feature can use to enroll students into subjects. However, there have two sections, the first one for first attempt enrollment.
                Hear admin can enroll particle student group into a subject. In the interface, there have two dropdowns to select a subject and
                student group. In the group dropdown, all possible student group codes are listed. You can see their descriptions from the right-hand
                side table. The subject dropdown shows a subject that only belongs to the current semester. After select both parameters, you can
                click proceed to enrollment button to complete the process. If the operation got successful you can see a confirmation message.
                The next section is repeated attempt enrollment. There has one dropdown to select the subject and test area to add to the student
                list. When you created a repeated student list, make sure to separate the student index number using only a comma. After complete both
                sections, you can click proceed to enrollment button to complete the process. If the operation is completed without errors, the system
                would show a success message.
                <br>
            </div>
            <br><br>

            <div id="backupManagement" style="font-size: 18px;">
                <b style="text-decoration: underline;">Backup management</b><br><br>
                This feature is used to create and restore system backups. Before using this feature, you must read all instructions given on the
                system. That is more helpful to use this feature easily and correctly.
                To create a new backup to the system, click create new backup button. Once you click it, the system will generate a backup file and
                save it on the system itself and issue a copy for download as well.
                The important thing is maintaining service also create in-house backup automatically. <br><br>
                The system provides two options to restore backups. One is to use in-house backup and the other option is to use a local backup file.
                It is highly recommended to use in-house backups because they are secure. To restore an in-house backup, you can select backup point
                under restore by in-house backup and click on it. Then the system asks for confirmation, once you do it system restores the selected
                backup. Another option is to use backup files. Under the restore by file option, you can browse the backup file and by clicking the
                restore button you can restore from the selected backup file.
                <br>

            </div>
            <br><br>

        </div>

        <div class="meetingAppointment" id="meetingAppointment">
            <div id="meetingAppointmentRequest">
                <b style="font-size: 24px;">Meeting appointment request</b><br><br>
                <div style="font-size: 18px;">This feature will use by a student.</div>

            </div>
            <br><br>

            <div id="createAppointment" style="font-size: 18px;">
                <b style="text-decoration: underline;">Create appointment</b><br><br>
                This component use for create an appointment for meeting with a lecturer. There has a form for crate the appointment and it has fields
                for a complete appointment.
                Lecture name, time duration, title, message type, time, date, these input fields are include in an appointment request.
                When you want to create appointment, you must fill the form with no space then submit. <br><br>
                If you submit form with null fields then system will create error. You must fill all fields to a success appointment. <br>

            </div>
            <br><br>

            <div id="viewPreviousAppointment" style="font-size: 18px;">
                <b style="text-decoration: underline;">View previous appointment</b><br><br>
                There, if you want to view your previous appointment there display like entries in the left.
                System will display your all the appointment requests which you create in last two weeks. <br><br>
                In that entries are coloured according to reply for that. If lecturer Accept that, the entry is green colour, if lecturer Reject it,
                then the entry is red colour. If the appointment is not viewed yet then the entry is white colour.
                User can display the details of each appointment by click on entry. <br>

            </div>
            <br><br>

            <div id="lecturerAvailability" style="font-size: 18px;">
                <b style="text-decoration: underline;">Lecture availability</b><br><br>
                This feature can get from the navigation bar. From this component users can view availability of each lecture. There will display few
                details of the lecturer and available time of specific day.
                <br>
            </div>
            <br><br>

            <div id="meetingAppointmentRespond" style="font-size: 18px;">
                <b style="text-decoration: underline;">Meeting appointment respond Component</b><br><br>
                This feature will use by an academic staff member. <br><br>
                There are two features as New appointments and past appointment. In new appointment feature has not viewed appointment requests. And
                past appointment feature has viewed appointments.
                There the dates of requested for meeting of not viewed side appointments are always greater than today.
                And all past viewed appointments dates are belong to time period of last two weeks to today. <br><br>
                There all the appointments of two features are representing as entries. Then users can view appointments by click on each entry.
                In past appointment set if appointment accepted then its colour is green. If it rejected its colour is red. <br><br>
                User can view the new appointment by click on the entry. Then it has a field for type reply message for the request user can accept or
                reject the request after or not type a reply message.
                <br>
            </div>
            <br><br>
        </div>

        <div class="workloadManagement" id="workloadManagement">
            <div id="workloadManagement">
                <b style="font-size: 24px;">Workload management</b><br><br>
            </div>

            <div id="workloadRequest" style="font-size: 18px;">
                <b style="text-decoration: underline;">Workload request feature</b><br><br>
                This feature will use by Academic supportive head. When a lecturer wants to get allocate few supportive members then he or she send a
                message for academic supportive head. <br><br>
                All received messages will display in left side as entries. Then select a request message there show the request with details and
                click on allocate button to allocate supportive staff. If user doesn’t want to allocate there also has a cancel button. After click
                allocate button user can search free members in specific requested time period.
                Then you can view the free members in that period and you can select few members and allocate the workload to them. <br>

            </div>
            <br><br>

            <div id="workloadRespond" style="font-size: 18px;">
                <b style="text-decoration: underline;">Workload respond feature</b><br><br>
                This feature will use by each academic supportive member. If there have any workload allocation it will display in left hand side.
                Then you can select it and there will display a form for set a reply message and set response as accept or reject.
                And also, there has a tab for view history of the user. There have the past workload allocations. If you want download of this
                appointments as a pdf there are a button for it.
                <br>
            </div>
            <br><br>


        </div>

        <div class="timeTable" id="timeTable">
            <div>
                <b style="font-size: 24px;">Timetable</b><br>
            </div>
            <br><br>

            <div id="timeTableView" style="font-size: 18px;">
                <b style="text-decoration: underline;">Timetable view</b><br><br>
                This feature can use for every user. In this feature will display the timetable of user which related to specific semester. There are
                no inputs. Initially user must log to the system.

            </div>
            <br><br>

        </div>

        <div class="forgetPassword" id="forgetPassword">
            <div>
                <b style="font-size: 24px;">Forget/Reset password</b><br><br>
                <div style="font-size: 18px;">When user logging into the system, if user forget, user have to reset the password. This function use to
                    rest password. Initially user should submit the username to the system input form. After submit that user can receive a reset link
                    with email.
                    Then user link to the reset form by the email. There has a reset password form and it process with basic password validation.
                    After user reset old password with new strong password then user will return to the logging page. Now user can log into the system
                    by new password.
                </div>
                <br>
            </div>
            <br><br>
        </div>

        <div class="enrollCourse" id="enrollCourse">
            <div>
                <b style="font-size: 24px;">Enrol for Course Module</b><br><br>
                <div style="font-size: 18px;">3rd year students, 4th year students want to enrol for the course modules. That task done by this
                    feature. Here list out the all subjects what belongs to specific semester. Student must select compulsory subject and they can
                    select any subject according to their opinion. Also, total credit of selected subjects must more than validated credit value.
                    Student can enrol for selected subject after click by submit button.
                </div>
            </div>
            <br><br>
        </div>

        <div class="iqacReportManagement" id="iqacReportManagement">
            <div>
                <b style="font-size: 24px;">IQAC Report Management</b>
            </div>
            <br><br>

            <div id="addIQAC" style="font-size: 18px;">
                <b style="text-decoration: underline;">Add IQAC Report</b>
                IQAC officer who want to upload a IQAC report, first you log into the USSP with user name and password. Then click on the Add IQAC
                Report then go to interface of Add IQAC Report. Then you have to select the data values from the drop down sets. You select the values
                from dropdowns, the Lecturer, Subject, Examination year, Academic year and Semester related to the IQAC report you are going to
                upload. Then choose the file within pdf format and then click on the Upload button to upload the IQAC report file. If upload is
                successful you can see the alert ‘’. If there have any mistake during the operation you can see the error codes.
                <br><br>
                <b>Error Codes</b><br>
                IQAC01 – This error occur when at least one input field is not filled and upload the report <br>
                IQAC02 – This error occur when data didn’t insert into the system


            </div>
            <br><br>

            <div id="viewIQAC" style="font-size: 18px;">
                <b style="text-decoration: underline;">View IQAC Report</b>
                The lecturer who want to see your IQAC reports first you log into the USSP with user name and password. Then click on the View IQAC
                Report then go to interface of View IQAC Report. You can see your recent uploaded IQAC reports in right side of page. You can if you
                like to see one by one from the recent report list and click on it to download or see the reports that you wanted. Other method is if
                you want download or see your particular IQAC report then you can select the data values from the drop down sets and search it by
                click on the Search button. You select the values from dropdowns, the Examination year and Subject that related to the IQAC report you
                are going to download or see. Then open the file and you can see or if you want to download it, you can download.
                <br><br>
                <b>Error Codes</b><br>
                IQAC03 – This error occur when at least one input field is not filled and upload the report
            </div>
            <br><br>


        </div>

        <div class="trainSeasonManagement" id="trainSeasonManagement">
            <div>
                <b style="font-size: 24px;">Train Season Management</b>
            </div>
            <br><br>


            <div id="applyTrainSeason" style="font-size: 18px;">
                <b style="text-decoration: underline;">Apply Train Season</b> <br><br>
                The user who want to apply for the train season first you log into the USSP with user name and password. Then click on the Apply Train
                Season then go to interface of Apply Train Season. You can see the application form and some fields are automatically filled on it.
                These input fields are Full name, User name, Address and Age.
                <br><br>
                You have to fill the input fields From month (From which month do you want the train season), To month (Until which month do you want
                the train season), Nearest station from home (Nearest station to the home), Nearest station from university (Nearest station to the
                university). Then you can submit the form application by click on Submit button.
                You can apply for the train season maximum two times at the year. If you exceed the maximum requesting time and submit the form
                application, you get the warning message ‘The number of request time is over’. In the right side of the page you can see Request
                history of your train season requests per year.

                <br><br>
                <b>Error Codes</b><br>
                TSM01 – This error occur when data didn’t insert into the system <br>
                TSM03 – This error occur when your request time is exceed 2 <br>

            </div>
            <br><br>

            <div id="checkTrainSeason" style="font-size: 18px;">
                <b style="text-decoration: underline;">Check Train Season</b><br><br>
                The Train season officer who want to check the train season applications first you log into the USSP with user name and password. Then
                click on the Check Train Season then go to interface of Check Train Season. In this page you can see the application list requested by
                users which are not checked. You can click on one of this application set and then you direct to the related application form. Then
                you can see the application form with details filled by user who are requested the train season. Then check the details and fill the
                season ID field with particular season ID and then click on the check button to mark as checked the season application. If you after
                the checked the season application, then this application is not display in the application list.
                <br><br>
                <b>Error Codes</b><br>
                TSM02 – This error occur when data didn’t insert into the system <br>
                TSM04 - This error occur when data didn’t insert into the system <br>
                TSM05 - This error occur when data didn’t insert into the system <br>

            </div>
            <br><br>
        </div>

        <div class="message" id="message">
            <div>
                <b style="font-size: 24px;">Message</b>
            </div>
            <br><br>

            <div id="sendMessage" style="font-size: 18px;">
                <b style="text-decoration: underline;">Send Messages</b><br><br>
                The user who want to send messages, first you log into the USSP with user name and password. Then click on the Message then go to
                interface of Send Messages. If you are the staff member of Academic or Administrative or Academic supportive first you have to select
                the contacts from 4 dropdowns as you wish. Contact list are categorize into 4 groups. There are Academic, Administrative, AcaTydemic
                Supportive and Student. You can select the one contact or group of contacts from these dropdown sets that you want to send the
                message. Then you can type the message title and the message. After this you can send your message by click on the Send button. If the
                message is sent you can see the alert ‘Message send successfully.’.Then you want to see you sent message, click on the button Sentbox
                at above the page. Now you can see the sent messages by you. In the left hand side you can see the send message list. You can see the
                details of particular message by click on it. Then you can see details of the message in right hand side.
                <br><br>
                <b>Error Codes</b><br>
                UM01 – This error occur when at least one input field is not filled and upload the report <br>
                UM02- This error occur when data didn’t insert into the system <br>

            </div>
            <br><br>

            <div id="receiveMessage" style="font-size: 18px;">
                <b style="text-decoration: underline;">Receive Messages</b><br><br>
                If you received a message, you have to get notification. Then you can go message Inbox to view your message. You can see the messages
                list, that you received. Then you can click on the each message and see the details about it. After that you can click on ‘mark as
                read’. Then you can identify the messages that you are read by changed the color of message entry after click on ‘mark as read’.
                <br><br>

                <b>Error Codes</b><br>
                UM03- This error occur when failed to get message ID <br>
                UM04 - This error occur when data didn’t insert into the system <br>

            </div>
            <br><br>
        </div>

        <div class="pastPaperManagement" id="pastPaperManagement">
            <div>
                <b style="font-size: 24px;">Pastpaper Management</b>
            </div>
            <br><br>

            <div id="addPastpaper" style="font-size: 18px;">
                <b style="text-decoration: underline;">Add Past Paper</b><br><br>
                This feature is used to add past papers to the system. Only you have to do is select values from the dropdowns and upload the past
                paper. You should make sure to fill in all data before upload it. You can use two methods to get the past paper, drag past paper to
                the dashes or click the dashes area.
                Once you complete, then click on the upload button, then you will be able to see a successful alert message. If in case of operation
                failure, you will be able to see a red color error message. You can understand what the error is happened by reading them. <br><br>

                <b>Error Codes</b><br>
                #PPM01 – occur when failed to upload past paper.
                #PPM02 - occur when failed to get inputs.
                #PPM03 - occur when failed to load review list.

            </div>
            <br><br>

            <div id="viewPastpaper" style="font-size: 18px;">
                <b style="text-decoration: underline;"> View Past Papers</b><br><br>
                This feature is used to download the past papers. . Once you go to this, you can see the recent uploads section. You can download it
                by just click on the name of the file. Moreover, you can search past papers by entering data into the selection fields. You must fill
                in at least one drop-down to search data. You can download past papers as a zip file or PDF.
                <br><br>

                <b>Error Codes</b><br>
                #PPM03 - occur when failed to load review list.
                #PPM04 – This occurs when you need to fill at least one field.

            </div>
            <br><br>


        </div>

        <div class="attendanceManagement" id="attendanceManagement">
            <div>
                <b style="font-size: 24px;">Attendance Management</b>
            </div>
            <br><br>

            <div id="addAttendance" style="font-size: 18px;">
                <b style="text-decoration: underline;">Add Attendances</b><br><br>
                This feature is used to upload the attendance. You can add attendance as bulk and you can edit single attendance. When uploading
                attendance important thing to notice is you must upload a CSV file. Otherwise, it will give an error message. Also, make sure to fill
                all fields before submitting the attendance. If submit is a success you get a success message and if it is failed you get an error
                message.
                <br><br>
                The format of the CVS file is, <br><br>
                Number,index,attendance <br>
                1,18002233,1 <br><br>
                If you want to edit attendance you can fill the form carefully in the edit attendance section. You need the student index number in
                addition to the information that you need in the add attendance. (Index Number must be in 18xxxxxx format.). After searching you get
                particular students selected subject attendance. Then you can pick which week you need to change a select that week by just click on
                it. Then you get another form to edit attendance. If the edit is a success you get a success message and if it is failed you get an
                error message. There is an inquiry message section under edit attendance. This feature includes inquires that students sent according
                to their attendance.
                An important thing to notice in both add attendance and edit attendance is, make sure to enter the academic year and semester first.
                When you select them correctly, the subject dropdown will show the only subject that belongs to your selection. If you are unable to
                find the subject, then click the refresh icon (Q) next to the title subject. Then you can see the complete subject list.
                <br><br>
                <b>Error Codes</b><br>
                #SAM01 – Occur when failed to submit attendance. <br>

            </div>
            <br><br>

            <div id="viewAttendance" style="font-size: 18px;">
                <b style="text-decoration: underline;">View Attendance</b><br><br>
                This feature is used to view the attendance of the students. The first card shows the Overall attendance percentage of the semester.
                Also, there are remaining weeks, number of subjects next to the first card.
                You can be able to see your attendance related to the subjects. There are boxes according to the number of subjects and there are mini
                boxes related to one week. The left border of the mini box shows the attendance of the week. The red color means that not attendance.
                The green color border means attendance.
                If you have an inquiry about the attendance of some week, you can add inquiry by clicking the inquiry button(?). Then you must
                carefully fill in the week and subject. Also, you have to add a message about the reason for the inquiry. Once you are complete, click
                the send button. If sending is successful you will be able to see a notification. About saying the operation is successful. If in case
                of operation failure, you will be able to see a red color error message.

                <b>Error Codes</b><br>
                #SAMO2 – Occur when failed to submit an inquiry.
                #SAM03 – occur when failed to load attendance data

            </div>
            <br><br>
        </div>

        <div class="notificationManagement" id="notificationManagement">
            <div>
                <b style="font-size: 24px;">Notification Management</b>
            </div>
            <br><br>

            <div id="addNotification" style="font-size: 18px;">
                <b style="text-decoration: underline;">Add Notification</b><br><br>
                This feature is used to publish announcements. Only you need to do is fill the given form carefully. Important things to notice are,
                there is a set of checkboxes showing for which groups you can send announcements, you can select one or more among them, you can
                publish announcements under the given six categories and you must add time in weeks for notification under week field. After a given
                amount of weeks notification will not be available for the receiver.
                Before publishing the announcement you must fill all fields in the form, then you can click send button to publish the announcement.
                Once the send is complete you will be able to see a green color message, showing the operation is complete. Otherwise, you will get a
                red color error message showing what the error is.
                <br><br>
                <b>Error codes</b><br>
                #AM01 – this error occurs when the operation is not completed.

            </div>
            <br><br>

            <div id="viewNotification" style="font-size: 18px;">
                <b style="text-decoration: underline;">View Notification</b><br><br>
                This feature is used to view the notifications. Once you log in to the main interface you can see the latest few notifications that
                you received recently. Instead of that, here you can view all available notifications you received. You get notifications under seven
                categories. If you want to sort them according to the category, you can use a set of category names on the left side of the interface.
                The numerical character with each category name means the number of unread notifications in each type. Notification will be no longer
                available after sender defined time. Also, you can sort notifications according to the notification topic, content, and sender using
                the given search bar.

            </div>
            <br><br>

        </div>
    </div>
</div>

<!-- include footer section -->
<?php BasicLoader::loadFooter('../') ?>
<script src='../assets/js/jquery.js'></script>
<script src="../assets/js/toast.js"></script>
<script src="../assets/js/changeTheme.js"></script>
</html>