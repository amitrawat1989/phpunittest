<?php

declare(strict_types=1);

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

final class ContactUs
{ 

   private $restrictedEmails = array('0'=>'please@update.com');

   private function __construct(string $email,string $comments,string $subject, string $custom_text_field)

   {

       $this->validateContactUs($email,$comments,$subject,$custom_text_field);

   }

   public static function fromString(string $email,string $comments,string $subject, string $custom_text_field): self
   {
       return new self($email,$comments,$subject,$custom_text_field);
   }


   private function validateContactUs(string $email,string $comments,string $subject, string $custom_text_field): void
   {
       $_POST['comments']=$comments;
       $_POST['subject']=$subject;
       // $_POST['custom_text_field']=$custom_text_field;
       if($_POST['comments']=='') {
         throw new \InvalidArgumentException(

               sprintf(

                   'Comment is required.',

                   $email

               )

         );  
       }  

       if($_POST['subject']=='') {
         throw new \InvalidArgumentException(

               sprintf(

                   'Subject is required.',

                   $email

               )

         );
       }

       if(isset($_POST['custom_text_field']) && $_POST['custom_text_field']=='') {
         throw new \InvalidArgumentException(

               sprintf(

                   'Custom is required.',

                   $email

               )

         );
       }

       if(in_array($email, $this->restrictedEmails)) {
         throw new \InvalidArgumentException(

               sprintf(

                   'Entered email id is not valid.',

                   $email

               )

         );
      }

 

   }

}

final class ContactUsTest extends TestCase

{

   public function testCanBeCreatedFromValidEmailAddress(): void

   {

       $this->assertInstanceOf(

           ContactUs::class,

           ContactUs::fromString('user@example.com','testcomments','testsubject','')

       );

   } 
 

}