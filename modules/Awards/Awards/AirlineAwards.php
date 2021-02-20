<?php

namespace Modules\Awards\Awards;

use App\Contracts\Award;

/**
 * Simple example of an awards class, where you can apply an award when a user
 * has 100 flights. All award classes need to extend Award and implement the check() method
 *
 * See: https://docs.phpvms.net/developers/awards
 */
class AirlineAward extends Award
{
    /**
     * Set the name of this award class to make it easier to see when
     * assigning to a specific award
     *
     * @var string
     */
    public $name = 'Airline Award';

    /**
     * The description to show under the parameters field, so the admin knows
     * what the parameter actually controls. You can leave this blank if there
     * isn't a parameter.
     *
     * @var string
     */
    public $param_description = 'When a pilot flies with this airline';

    /**
     * If the user has over N flights, then we can give them this award. This method
     * only needs to return a true or false of whether it should be awarded or not.
     *
     * If no parameter is passed in, just default it to 100. You should check if there
     * is a parameter or not. You can call it whatever you want, since that would make
     * sense with the $param_description.
     *
     * @param int|null $airlineID The parameters passed in from the UI
     *
     * @return bool
     */
    public function check($airlineID = null): bool
    {
        if (!$airlineID) {
            $airlineID = 6;
        }

        return $this->user->last_pirep->airline_id === $airlineID;
    }
}
