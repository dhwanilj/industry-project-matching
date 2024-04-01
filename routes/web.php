<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//task 2 display project and its partner
Route::get('/', function () {
    $sql = 'select * from Project, IndustryPartner where Project.partnerId=IndustryPartner.partnerId';
    $projects = DB::select($sql);
    return view('home')->with('projects',$projects);
});

//task 3 project details
Route::get('project_detail/{projectId}',function($projectId){
    $project = get_project($projectId);
    $applicants = get_applicants($projectId);
    return view('project_detail')->with('project',$project)->with('applicants',$applicants);
});

// task 3, function to get the project details
function get_project($projectId){
    $sql = "select * from Project,IndustryPartner where Project.partnerId=IndustryPartner.partnerId and Project.projectId=?";
    $projects=DB::select($sql,array($projectId));
    $project = $projects[0];
    return $project;
}

//task 3 function to get the applicants for a project
function get_applicants($projectId){
    $sql = "select * from Student,StudentApplication where Student.studentId = StudentApplication.studentId and projectId = ?";
    $applicants = DB::select($sql,array($projectId));
    return $applicants; 
}

//task 4 advertise a project
Route::get('advertise_project', function () {
    return view('advertise_project');
});

//task 4 advertise project process
//new project advertising route
Route::post('advertise_project_action',function(){
    $projectTitle = request('projectTitle');
    $projectField = request('projectField');
    $projectDetails = request('projectDetails');
    $NoOfStudents = request('NoOfStudents');
    $partnerName = request('partnerName');
    $partnerLocation = request('partnerLocation');
    Session::put('partnerName',$partnerName);
    Session::put('partnerLocation',$partnerLocation);
    //task 9 server side validation
    if(empty($projectTitle)or empty($projectField)or empty($projectDetails)or empty($NoOfStudents)or empty($partnerName) or empty($partnerLocation)){
        return back()->withErrors(['Error: All fields must be filled.']);
    }
    elseif($NoOfStudents<3 or $NoOfStudents>8){
        return back()->withErrors(['Error: No of Students must be between 3 and 8']);
    }
    else{
        $sql = 'select * from IndustryPartner where partnerName=? and partnerLocation=?';
        $partners = DB::select($sql,array($partnerName,$partnerLocation));
        
        if (count($partners)==1){
            $partner = $partners[0];
            $partnerId=$partner->partnerId;
        }
        elseif(count($partners)==0){
            $sql = 'insert into IndustryPartner(partnerName, partnerLocation) values (?, ?)';
            $partner = DB::insert($sql,array($partnerName,$partnerLocation));
            $partnerId = DB::getPDO()->lastInsertId();
        }
        else{
            die('Error');
        }
    }   
    $newproject = advertise_project($projectTitle, $projectField, $projectDetails, $NoOfStudents, $partnerId);
    return redirect(url("project_detail/$newproject"));
});


// task 4 function to advertise a new project
function advertise_project($projectTitle, $projectField, $projectDetails, $NoOfStudents, $partnerId){
    $sql = "insert into project (projectTitle, projectField, projectDetails, NoOfStudents, partnerId) values (?, ?, ?, ?, ?)";
    DB::insert($sql,array($projectTitle, $projectField, $projectDetails, $NoOfStudents, $partnerId));
    $projectId = DB::getPDO()->lastInsertId();
    return ($projectId);
}

//task 5 form for updating the project
Route::get('edit_project/{projectId}',function($projectId){
    $project = get_project($projectId);
    return view('edit_project')->with('project',$project);
});

//task 5 updating the project process
Route::post('edit_project_action',function(){
    $projectTitle = request('projectTitle');
    $projectField = request('projectField');
    $projectDetails = request('projectDetails');
    $NoOfStudents = request('NoOfStudents');
    $projectId = request('projectId');
    $updatedproject = edit_project($projectId,  $projectTitle, $projectField, $projectDetails, $NoOfStudents);
    return redirect(url("project_detail/$updatedproject"));
});


//task 5 function to update or edit the project details
function edit_project($projectId,  $projectTitle, $projectField, $projectDetails, $NoOfStudents) {
    $sql = "update project set projectTitle = ?, projectField = ?, projectDetails = ?, NoOfStudents = ? where projectId = ?";
    DB::update($sql , array( $projectTitle, $projectField, $projectDetails, $NoOfStudents, $projectId));
    return ($projectId);
}

//task 6 form for confirming delete
Route::get('delete_project/{projectId}',function($projectId){
    $project = get_project($projectId);
    return view('delete_project')->with('project',$project);
});

//task 6 deleting the project process
Route::post('delete_project_action',function(){
    $projectId = request('projectId');
    delete_project($projectId);
    return redirect(url("/"));
});

//task 6 deleting the project process
function delete_project($projectId) {
    $sql = "delete from StudentApplication where projectId = ?";
    DB::delete($sql , array($projectId));
    $sql = "delete from Project where projectId = ?";
    DB::delete($sql , array($projectId));
}

//task 7 student application form for the project
Route::get('student_apply/{projectId}',function($projectId){
    $project = get_project($projectId);
    return view('student_apply_form')->with('project',$project);
});
//task 7 student application will be processed and getting back to details page
Route::post('student_apply_action/{projectId}',function(){
    $projectId = request('projectId');
    $fname = request('fname');
    $lname = request('lname');
    $justification = request('justification');
    $preference = request('preference');
    $sql = "select * from student where fname =? and lname = ?";
    $students = DB::select($sql,array($fname, $lname));
    $NoOfApplication = request('NoOfApplication');
    $project = get_project($projectId);
    
    if(empty($fname) or empty($lname) or empty($justification) or empty($preference)){
        Session::put('fname',$fname);
        Session::put('lname',$lname);
        return back()->withErrors(['All fields must be provided.']);
        
    }

    //same preference not to be entered
    $sql = 'select * from Student,StudentApplication where Student.studentId=StudentApplication.studentId and fname=? and lname=? and preference=?';
    $chance = DB::select($sql,array($fname,$lname, $preference));
    if(count($chance)==1){
        Session::put('fname',$fname);
        Session::put('lname',$lname);
        Session::put('justification',$justification); 
        return back()->withErrors(['Cannot enter the same preference again.']);
    }

    //checking if student has student id 
    if (count($students) == 1){
        $student = $students[0];
        $studentId = $student->studentId;
    }
    elseif(count($students) == 0){
        $sql = "insert into Student (fname, lname) values (?, ?)";
        DB::insert($sql, array($fname,$lname));
        $studentId = DB::getPDO()->lastInsertId();  
    }
    else{
        die('Error');
    }

    // task 10 checking if the student has already applied
    $sql = "select * from StudentApplication where projectId= ? and studentId = ?";
    $applications = DB::select($sql,array($projectId, $studentId));
    if (count($applications)==1){
        return back()->withErrors(["Student has already applied"]);
    }
    else{
        add_application($projectId, $studentId, $justification, $preference);
        increment($projectId,$NoOfApplication);
    }
    $project = get_project($projectId);
    $applicants = get_applicants($projectId);
    return redirect(url("project_detail/$projectId"));
});

//task 7 function to add a applicant 
function add_application($projectId, $studentId, $justification, $preference){
    $sql = "insert into StudentApplication (projectId, studentId, justification, preference) values(?, ?, ?, ?)";
    DB::insert($sql, array($projectId, $studentId, $justification, $preference));
}

//task 7, 12 
function increment($projectId,$NoOfApplication){
    $sql = 'update Project set NoOfApplication =?+1 where projectId = ?';
    DB::update($sql,array($NoOfApplication,$projectId));
}



//task 8 route to get the student justification for the given project
Route::get('student_detail_project/{projectId}/{studentId}',function($projectId,$studentId){
    $students = get_student($studentId,$projectId);
    $student = $students[0];
    return view('student_detail_project')->with('student',$student);
});

//task 8 function to get student details for the particular 
function get_student($studentId,$projectId){
    $sql = "select * from Student, StudentApplication,Project where Project.projectId=StudentApplication.projectId and StudentApplication.studentId=Student.studentID and StudentApplication.projectId=? and StudentApplication.studentId=?";
    $details=DB::select($sql,array($projectId,$studentId));
    return $details;
}

//task 11 showing the list of all students
Route::get('list_students', function () {
    $students = students_list();
    return view('list_students')->with('students',$students);
});

//task 11 function to get the student list 
function students_list(){
    $sql = "select * from Student";
    $students=DB::select($sql);
    return $students;
}

//task 11 showing details of students
Route::get('student_detail/{studentId}',function($studentId){
    $students = get_student_detail($studentId);
    $student1=$students[0];
    return view('student_detail')->with('students',$students)->with('student1',$student1);
});

//task 11 function to get student detail of all project which he applied to
function get_student_detail($studentId){
    $sql = "select * from Student, StudentApplication, Project, IndustryPartner where Project.partnerId=IndustryPartner.partnerId and StudentApplication.studentId=Student.studentID and Project.projectId=StudentApplication.projectId and Student.studentId=?";
    $details=DB::select($sql,array($studentId));
    //dd($project);
    return $details;
}

//task 13 route for top 3 industry partners
Route::get('top_partners', function () {
    $sql = 'select partnerName,count(partnerName) as total from Project,IndustryPartner where Project.partnerId=IndustryPartner.partnerId group by partnerName order by total desc limit 0,3';
    $top3 = DB::select($sql);
    return view('top_partners')->with('top3',$top3);
});

//task 15 project assignment page
Route::get('project_assignment_page',function(){
    
    $sql = 'select * from project';
    $projects = DB::select($sql);
    $ID=array();
    foreach($projects as $project){
        $ID[]=$project->projectTitle;
    }
    $assign = assign();
    dd($ID,$assign);
    return view('project_assignment_page')->with('assign',$assign);
});

//Documentation
Route::get('documentation',function(){
    return view('documentation');
});

function assign(){
    $assign = array();
    $selected = array();
    $select = array();
    $ID=array();
    $sql = 'select * from project';
    $projects = DB::select($sql);
    $a = count($projects);
    foreach($projects as $project){        
        $sql = "select (fname|| lname)as name,* from StudentApplication,Student where Student.studentId=StudentApplication.studentId and projectId=?";
        $students = DB::select($sql,array($project->projectId));
        foreach($students as $student)
            if(count($assign)!=$project->NoOfStudents){
                if(($student->preference) == 1){
                    $name = $student->name;
                    $assign[]=$name;
                    $selected[]=$student;
                }
            }
        $select[]=$assign;
        $assign = array();
    }
    return $select;
}