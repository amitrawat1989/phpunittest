<?php

declare(strict_types=1);

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

final class ForgotUsername

{

   private $email;

   private function __construct(string $email)

   {

       $this->ensureIsValidEmail($email);

       $this->email = $email;

   }

   public static function fromString(string $email): self

   {
       return new self($email);
   }


   private function ensureIsValidEmail(string $email): void

   {

       if (empty($email) || $email == '') {

           throw new \InvalidArgumentException(

               sprintf(

                   'Please enter email',

                   $email

               )

           );
       }


       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

           throw new \InvalidArgumentException(

               sprintf(

                   'Please enter a valid email',

                   $email

               )

           );

       }

   }

}

final class ForgotUsernameTest extends TestCase

{

   public function testCanBeCreatedFromValidEmailAddress(): void

   {

       $this->assertInstanceOf(

           ForgotUsername::class,

           ForgotUsername::fromString('user@example.com')

       );

   } 
 

}