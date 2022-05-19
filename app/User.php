<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;
use App\Role;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use Sortable;

    public $sortable = [ 
        'id', 
        'name', 
    ];


    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'sexo',
        'profile_pic',
    ];

    protected $hidden = [
        'password', 
        'remember_token', 
        'is_active',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $results;
    }
    
    
    public static function sendVerificationEmail($user)
    {
        $activate_code = bcrypt(Str::random(15));
        $user->remember_token = $activate_code;
        $user->save();
        $viewData['full_name'] = $user->name;
        $email_code = $user->remember_token;
        $viewData['link'] = asset('/verify_account?token=') . $email_code;
        Mail::send('auth.email_verification', $viewData, function ($m) use ($user) {
            $m->from('teste@teste.com', 'teste');
            $m->to($user->email, $user->name)->subject('Confirmation Email');
        });
    }

    public static function requestPasswordReset($email)
    {
        self::generatePasswordResetToken($email);
        return self::sendPasswordResetEmail($email);
    }


    public static function generatePasswordResetToken($email)
    {
        if (User::where('email', $email)->first()) {
            DB::table('password_resets')->where('email', $email)->delete();
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => bcrypt(Str::random(15)),
                'created_at' => Carbon::now()
            ]);
        }
    }

    public static function sendPasswordResetEmail($email)
    {
        $token = DB::table('password_resets')->where('email', $email)->first();
        if ($token) {
            $user = DB::table('users')->where('email', $email)->select('name','email')->first();
            $viewData['full_name'] = $user->name;
            $viewData['link'] = asset('/reset_password?token=') . $token->token;
            Mail::send('auth.forgot_password', $viewData, function ($m) use ($user) {
                $m->from('teste@teste.com', 'teste');
                $m->to($user->email, $user->name)->subject('Forget Password Email');
            });
            return true;
        }
        return false;
    }
    

    public function roles(){
        return $this->belongsToMany(Role::class,'user_role')->withTimestamps();
    }

    public function existeRoles($role_id){
        return (boolean) $this->roles()->find($role_id);
    }

    public function getJWTIdentifier()
    {
        return $this->getkey();
    }

   
    public function getJWTCustomClaims()
    {
        return [
            'name' => $this->name, 
            'email' => $this->email,
        ];
    }


    

}
