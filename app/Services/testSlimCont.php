<?php

// 
namespace App\Services;


class testSlimCont
{
   public static function checkReply($data)
   {

      if ($data == null) {
         $data = 0;
      }
      return $data;
   }
}
