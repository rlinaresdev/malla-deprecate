<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Store extends Model {

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
