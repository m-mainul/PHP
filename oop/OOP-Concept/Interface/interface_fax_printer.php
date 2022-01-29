<?php
  interface fax{
    public function dial();
    public function send();
    public function recieve();
  }

  interface printer{
    public function printBlack();
    public function printColor();
    public function printDraft();
    public function kick();
  }
  
  class printerFax implements fax, printer{
    public function dial(){ }
    public function send(){ }
    public function recieve(){ }
    public function printBlack(){ }
    public function printColor(){ }
    public function printDraft(){ }
    public function kick(){ }
  }

    $object = new printerFax;
?>