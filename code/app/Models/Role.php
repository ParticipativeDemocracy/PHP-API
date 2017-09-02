<?php namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use App\Models\Traits\HasNameFieldTrait;

/**
* Class Role
* @package App\Models\Role
* @property $name - Unique name for the Role, used for looking up role information
* in the application layer. For example: "admin", "owner", "employee
* @property $display_name - Human readable name for the Role. Not necessarily
* unique and optional. For example: "User Administrator", "Project Owner",
* "Widget Co. Employee".
* @property $description - A more detailed explanation of what the Role does.
* Also optional.
*/
class Role extends EntrustRole
{
  use HasNameFieldTrait;

  /**
  * Company Member Role
  */
  const COMPANY_MEMBER = 'company_member';
}
