<?php

namespace App\Repositories;

interface UserManagementRepositoryInterface
{
   public function createProject($data);
   public function getAllUser();
   public function getAllStudent();
   public function getAllTeacher();
}