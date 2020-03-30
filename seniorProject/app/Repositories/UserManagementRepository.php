<?php

namespace App\Repositories;

use App\Model\Group;
use App\Model\Project;
use App\Model\User;
use App\Model\UserRole;
use App\Model\ProjectDetail;

class UserManagementRepository implements UserManagementRepositoryInterface
{

    public function createProject($data)
    {
        $count_project = Project::where('project_id', 'like', "$data[department]%");
        $project_id = $data['department'] . '01';
        if (count($count_project->get()) > 0) {
            $last_project_id = $count_project->orderby('project_id', 'desc')->first()->project_id;
            $project_id = substr($last_project_id, 2, 2);
            $project_id++;
            if ($project_id > 9) {
                $project_id = $data['department'] . $project_id;
            } else {
                $project_id = $data['department'] . '0' . $project_id;
            }
        }


        $project = new Project;
        $project->project_id = $project_id;
        $project->project_name = $data['project_name'];
        $project->save();

        $project_detail = new ProjectDetail;
        $project_detail->project_detail = $data['project_detail'];
        $project_detail->internal_project_id = $project->id;
        $project_detail->save();

        foreach ($data["user_id"] as $value) {
            $internal_user_id = User::select('id')->where('user_id',"$value")->first()->id;
            $group = new Group;
            $group->internal_user_id = $internal_user_id;
            $group->internal_project_id = $project->id;
            $group->save();
        }
    }

    public function getAllUser()
    {
        $users =  User::join('users_roles', 'users.id', '=', 'users_roles.internal_user_id')
            ->join('roles', 'roles.id', '=', 'users_roles.internal_role_id')
            ->get();
        return $users;
    }

    public function getAllStudent()
    {
        $users =  User::join('users_roles', 'users.id', '=', 'users_roles.internal_user_id')
            ->join('roles', 'roles.id', '=', 'users_roles.internal_role_id')->where('role_name', 'Student')
            ->get();
        return $users;
    }

    public function getAllTeacher()
    {
        $users =  User::join('users_roles', 'users.id', '=', 'users_roles.internal_user_id')
            ->join('roles', 'roles.id', '=', 'users_roles.internal_role_id')->where('role_name', 'Teacher')
            ->get();
        return $users;
    }
}
