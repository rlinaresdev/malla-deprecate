<?php
namespace Malla\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

   protected $table = "ugroups";

   protected $fillable = [
      "user_id",
      "parent",
      "slug",
      "name",
      "view",
      "insert",
      "update",
      "delete",
      "activated",
      "created_at",
      'updated_at'
   ];

   //public $timestamps = false;

   //protected $dateFormat = 'U';
}
