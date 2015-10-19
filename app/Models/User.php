<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract, BillableContract
{
    use Authenticatable, CanResetPassword, Billable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    public function orders()
    {
        return $this->hasMany('Order');
    }

    public function users()
    {
        return $this->hasMany('Measurement');
    }

    public function droppedOrders()
    {
        return $this->orders()->where('status', '=', 'dropped')->orderBy('updated_at');
    }

    public function unfinishedOrders()
    {
        return $this->orders()->where('status', '=', 'started')->orderBy('updated_at');
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

}
