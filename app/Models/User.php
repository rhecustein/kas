<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_identification_number',
        'name',
        'username',
        'email',
        'password',
        'gender',
        'phone_number',
        'school_year_start',
        'school_year_end',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->username = static::generateUniqueUsername($user->name);
        });
    }

    protected static function getFirstName($name) {
        $trim = trim($name);
        $pattern = '/^(\S+)/';
        if (preg_match($pattern, $trim, $matches)) {
            return $matches[1];
        }
        return '';
    }

    protected static function generateUniqueUsername($name)
    {
        $tolower = strtolower($name);
        $firstName = static::getFirstName($tolower);

        $baseUsername = Str::slug($firstName);
        $username = $baseUsername;
        $counter = 1;

        while (static::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }

    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class);
    }




    public function createdCashTransactions():HasMany
    {
        return $this->hasMany(CashTransaction::class, 'created_by');
    }


    public function  studentCashTransactions(): HasMany
    {
        return $this->hasMany(CashTransaction::class, 'student_id');
    }

    public function getGenderName(): string
    {
        if(is_null($this->gender)) return null;
        return $this->gender === 1 ? 'Laki-laki' : 'Perempuan';
    }
}
