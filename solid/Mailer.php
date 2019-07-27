<?php

//Hint - Dependency Inversion Principle
interface MailClientInterface
{
   public function send();
}

class Mailer implements MailClientInterface
{
  public function send(){
    echo "Mailer message sent";
  }
}
class Goolge implements MailClientInterface
{
  public function send(){
    echo "Goolge message sent";
  }
}
class Sendgrid implements MailClientInterface
{
  public function send(){
    echo "Sendgrid message sent";
  }
}
class Mailchimp implements MailClientInterface
{
  public function send(){
    echo "Mailchimp message sent";
  }
}

class Sender
{
    private $mailClient;
    public function __construct(MailClientInterface $mailClient)
    {
      $this->mailClient = $mailClient;
    }
    public function sendMessage(){
      $this->mailClient->send();
    }
}


$sender = new Sender(new Mailchimp);
$sender->sendMessage();