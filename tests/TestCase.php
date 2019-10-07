<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Validation\ValidationException;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param array $array
     * @param message $message
     *
     * - Check a message exist in array
     */
    public function assertContainErrorMessage($message, $array)
    {
        $this->assertContains($message, $array);
    }

    /**
     * @param Illuminate\Validation\ValidationException $e
     * @param message $message
     *
     * - Check a message exist in array error of ValidationException
     */
    public function assertValidatorExceptionContainErrorMsg(ValidationException $e, $message)
    {
        $allMessage = $e->validator->getMessageBag()->all();
        $this->assertContainErrorMessage($message, $allMessage);
    }
}
