<?php
/* RGPD CLASS */

class RGPD {

/* cookie set up */
private $cookie = false;
/* cookie enabled */
private $active = false;
/* cookie expire time */
private $expire = 3600*24*360;

public function __construct ( $action ) {
  $this->TestCookies();
  $this->SetCookies($action);
  }

private function TestCookies () {

  /* cookie already set for this browser */
  if ( isset($_COOKIE['RGPD']) ) {
    $this->cookie = true;

    if ($_COOKIE['RGPD'] == 1) {
      $this->active = true;
      }
    }

  }

/* cookie save */
private function SetCookies ( $action ) {

    if ( $action == 0 || $action == 1 ) {
      setcookie("RGPD", $action, time() + $this->expire);
      $this->cookie = true;
      $this->active = ($action == 0) ? false : true ;
      }

  }

/* getter output */
public function IsCookie () {
  return $this->cookie;
  }

public function IsActive () {
  return $this->active;
  }

}

?>