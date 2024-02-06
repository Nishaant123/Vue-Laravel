<?php
use App\Models\Employee;
function getdata(){
   $data=Employee::get();
   return $data;
}

?>