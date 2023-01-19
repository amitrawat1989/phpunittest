<?php

declare(strict_types=1);

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

final class MyAccount

{
 
   private $is_mobile_number_required='yes';
   private $restrictedEmails = array('0'=>'please@update.com');

   private function __construct(string $email,string $phone)

   {

       $this->validateEmailAndPhone($email,$phone);

   }

   public static function fromString(string $email,string $phone): self

   {
       return new self($email,$phone);
   }


   private function validateEmailAndPhone(string $email,string $phone): void

   {

       if(trim($email) == '') {

           throw new \InvalidArgumentException(

               sprintf(

                   'Email is required.', 
               )

           );
       }


      if($this->is_mobile_number_required == 'yes'){ 
        if(trim($phone) == '') {
         throw new \InvalidArgumentException(

               sprintf(

                   'Phone is required.',  

               )

           );
        }
      }

      if(in_array($email, $this->restrictedEmails)) {
         throw new \InvalidArgumentException(

               sprintf(

                   'Entered email id is not valid.',

 
               )

         );
      }

   }

}

final class MyAccountTest extends TestCase

{

   public function testCanBeCreatedFromValidEmailAddress(): void

   {

       $this->assertInstanceOf(

           MyAccount::class,

           MyAccount::fromString('user@example.com','342442')

       );

   } 
 

}