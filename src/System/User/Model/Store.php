<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Store extends Authenticatable {

   use HasApiTokens, HasFactory, Notifiable;
   
   protected $table = "users";

   protected $fillable = [
      "fullname",
      "rnc",
      "user",
      "cellphone",
      "email",
      "email_verified_at",
      "password",
      "avatar",
      "metagroups",
      "metarols",
		"activated",
		"created_at",
		"updated_at"
   ];

   protected $hidden = [
      'password', 'remember_token',
   ];

   /*
  * SETTINGS */
   public function setPasswordAttribute($value) {
      $value = trim($value);
      $value = bcrypt($value);
      $this->attributes['password'] = $value;
   }

   /*
  * RELATIONS */
   public function info() {
      return $this->hasOne(Info::class, "user_id");
   }
   public function meta() {
      return $this->hasMany(Meta::class, "user_id");
   }

   public function groups() {
      return $this->belongsToMany(Group::class, "users_groups", "user_id", "group_id")->withPivot(
          "view", "insert", "update", "delete"
      );
   }

   //public $timestamps = false;

   //protected $dateFormat = 'U';
}
