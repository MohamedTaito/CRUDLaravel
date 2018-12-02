<?php

namespace taskk;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class employees extends Model implements AuthenticatableContract, CanResetPasswordContract
{use Authenticatable, CanResetPassword;
  public $timestamps = false;

  //
  protected $fillable = [
      'id' ,'first_name', 'last_name' , 'email' , 'phone', 'companies_id', 'deactivate',
  ];
}
