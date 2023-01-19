<?php

declare(strict_types=1);

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

final class Login

{



   private function __construct(string $username,string $password)

   {

       $this->validateEmailAndPhone($username,$password);

   }

   public static function fromString(string $username,string $password): self

   {
       return new self($username,$password);
   }


   private function validateEmailAndPhone(string $username,string $password): void

   {

       if(trim($username) == '') {

           throw new \InvalidArgumentException(

               sprintf(

                   'Username is required.'
               )

           );
       }

         if(trim($password) == '') {
            throw new \InvalidArgumentException(

               sprintf(

                   'Password is required.',
  

               )

           );
      }

    

   }

}

final class LoginTest extends TestCase

{

   public function testCanBeCreatedFromValidEmailAddress(): void

   {

       $this->assertInstanceOf(

           Login::class,

           Login::fromString('userexample','fddsffd')

       );

   } 
 

}