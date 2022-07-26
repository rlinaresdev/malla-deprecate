<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Info extends Model {

   protected $table = "udata";

   protected $fillable = [
      "user_id",
      "firstname",
      "lastname",
      "email",
      "birthday",
      "gender"
   ];

   public $timestamps = false;
}
