<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Subscriber extends Authenticatable
{
    use HasApiTokens, HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_session_id',
        'name',
        'username',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public static function newSubscriber($request)
    {
       return Subscriber::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);
    }

    public function updateSubscriber($request)
    {
        $this->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => ($request->password) ? Hash::make($request->password) : $this->password,
            'status' => $request->status
        ]);
    }
}
