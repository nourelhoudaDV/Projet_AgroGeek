<?php

namespace App\Models\Admin;


use App\helper\Data\Faker;
use App\Traits\models\ModelDefaultFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;




class Admin extends Authenticatable
{
    use HasFactory, ModelDefaultFunctions;

    protected $guard = 'admin';

    public $table = "useradmins";
    public $primaryKey = "idUAdm";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    public const PK = 'idUAdm';

    public function getAuthPassword()
    {
        return $this['pswrd'];
    }





    /*
     * reset all rows password to the email
     */
    public static function resetPasswords()
    {
        self::all()->each(function (Admin $admin) {
            if (empty($admin['email'])) {
                $faker = new Faker();
                $admin->update([
                    'email' => $faker->faker()->email()
                ]);
            }
            $admin->update([
                'pswrd' => \Hash::make($admin['email'])
            ]);
        });

    }


    /***
     * Get the admin who create this intance
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function createdByUser()
    {
        return $this->hasOne(self::class, self::PK, 'createdBy');
    }

    public function updatedBy()
    {
        return $this->hasOne(self::class  , self::PK , 'lastUpdateBy');
    }

    /***
     * Get the connected admins
     *
     * @return Builder|\LaravelIdea\Helper\App\Models\UserManagement\_IH_Admin_QB
     */
    public static function onlineAdmins(): Builder|\LaravelIdea\Helper\App\Models\UserManagement\_IH_Admin_QB
    {
        $now = now();
        $dafaultOfflineTime = config('algomed.default_offline_time');
        return self::query()
            ->whereNotNull('last_seen')
            ->whereRaw("last_seen between date_sub(?, INTERVAL $dafaultOfflineTime minute) and date_add(?, INTERVAL $dafaultOfflineTime minute)", [$now->subMinutes(2)->toDateTimeString(), $now->addMinutes(5)->toDateTimeString()]);
    }


}
