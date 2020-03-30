<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserManagementRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller 
{

    private $userManagement;

    public function __construct(UserManagementRepositoryInterface $userManagement)
    
    {
        $this->userManagement = $userManagement;
    }

    public function storeProject(Request $request)
    {
        //ตรวจสอบข้อมูล
        $validator =  Validator::make($request->all(), [
            'project_name' => 'required',
            'department' => 'required',
            'user_id' => 'required',
            'project_detail' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json('กรุณากรอกข้อมูลให้ครบ',400);;
        }
        //
        $data = $request->all();
        $this->userManagement->createProject($data);

    }

    public function index()
    {
        $users = $this->userManagement->getAllUser();
        return response()->json($users, 200);
    }
    
    public function indexStudent(){
        $students = $this->userManagement->getAllStudent();
        return response()->json($students, 200);
    }

    public function indexTeacher(){
        $teachers = $this->userManagement->getAllTeacher();
        return response()->json($teachers, 200);
    }
}
