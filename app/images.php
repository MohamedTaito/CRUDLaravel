<?php

namespace taskk;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class images extends Model implements AuthenticatableContract, CanResetPasswordContract
{use Authenticatable, CanResetPassword;

  //
  protected $fillable = [
      'id', 'path',
  ];
}
