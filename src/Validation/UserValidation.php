<?php

namespace Myohanhtet\Validation;

use Myohanhtet\Model\User;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;
class UserValidation
{
    /**
     * @param array $data
     * @return true
     */
    public function UserStoreValidation(array $data)
    {
        $validator = v::key('name',v::notEmpty()->alpha(' ')->setName("Name"))
            ->key("user_code",v::stringType()->callback(function ($input) {
                // Check uniqueness using isPatientNoUnique method
                $user = User::where('user_code','=',$input);
                return $user === null;
            })->length(2, 20)->setName('User Code'))
            ->key('password',v::stringType()
                ->length(8, 20)
                ->regex('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/')
                ->setTemplate('Password must be 8-20 characters long, contain letters and numbers, and must include at least one special character.')
            );
        try {
            $validator->assert($data);
            return true; // Validation successful
        } catch (ValidationException $exception) {
            return $exception->getMessages(); // Return validation error messages
        }
    }

    /**
     * @param $data
     * @param $existingUserCode
     * @return true
     */
    public function UserUpdateValidation($data, $existingUserCode)
    {
        $validator = v::key('name',v::notEmpty()->alpha(' ')->setName("Name"))
            ->key("user_code",v::stringType()->callback(function ($input) use ($existingUserCode){
                // Check uniqueness using isPatientNoUnique method
                if ($input !== $existingUserCode) {
                    $user = User::where('user_code','=',$input);
                    return $user === null;
                }
                return true;
            })->length(2, 20)->setName('User Code'))
            ->key('password',v::optional(
                v::stringType()
                    ->length(8, 20)
                    ->regex('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/')
                    ->setTemplate('Password must be 8-20 characters long, contain letters and numbers, and must include at least one special character.')
                )
            );
        try {
            $validator->assert($data);
            return true; // Validation successful
        } catch (ValidationException $exception) {
            return $exception->getMessages(); // Return validation error messages
        }
    }

}