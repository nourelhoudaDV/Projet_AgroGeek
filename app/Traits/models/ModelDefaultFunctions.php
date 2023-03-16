<?php

namespace App\Traits\models;

use Carbon\Carbon;

/*
 * create lots of function that models needs  to apply the rule od DRY (Don't repeat yourselfDon't repeat yourself)
 * functions like : fullname,age ... and more
 */

trait ModelDefaultFunctions
{

    /*
    |------------------------------------------------------------------------------
    |   1 -  functions like age,fullname or any function that represent human being
    |------------------------------------------------------------------------------
    */


    /*
    * get the full name
    */
    public function age($birthday_col = 'dateNaissance')
    {
        if (empty($this[$birthday_col])) {
            return '';
        }
        return Carbon::parse($this[$birthday_col])->age;
    }

    /*
     * get the full name
     */
    public function getFullName($first_name_col = 'prenom', $lastName = 'nom')
    {
        return ucfirst($this[$first_name_col]) . ' ' . $this[$lastName];
    }


    /*
    |------------------------------------------------------------------------------
    |   1 -  functions represent the model him self
    |------------------------------------------------------------------------------
    */

    // get the created by model
    public function createdBy($created_by_name_col = 'createdBy')
    {
        return !empty($created_by_name_col) ? $this[$created_by_name_col] : '';
    }




    // get the created by model
    public function gender($gender_name_col = 'genre')
    {

        return match ($this[$gender_name_col]) {
            'H' => 'Homme',
            'F' => 'Femme',
            'default' => ''
        };
    }


}
