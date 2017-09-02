<?php namespace App;

use Zizaco\Entrust\EntrustPermission;
/**
* Class Permission
* @package App\Models\Permission
* @property $name - Unique name for the Role, used for looking up role information
* in the application layer. For example: "admin", "owner", "employee
* @property $display_name - Human readable name for the Role. Not necessarily
* unique and optional. For example: "User Administrator", "Project Owner",
* "Widget Co. Employee".
* @property $description - A more detailed explanation of what the Role does.
* Also optional.
*/
class Permission extends EntrustPermission
{

}
