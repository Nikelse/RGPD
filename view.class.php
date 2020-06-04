<?php
/* RGPD VIEW */

require_once("rgpd.class.php");

class View extends RGPD {

public function __construct ( $action ) {
  parent::__construct( $action );
  echo $this->HTML();
  }

public function HTML () {

  $html = "
  <!DOCTYPE html>
  <HTML>
    <HEAD>
      <META charset='utf-8' />
      <TITLE>General Data Protection Regulation</TITLE>
    </HEAD>
    <BODY>";

  $html .= $this->Details() . $this->Message();

  $html .= "
    </BODY>
  </HTML>";

  return $html;
  }

public function Message () {

  if ( !$this->IsCookie() ) {
  return "
  <DIV id='rgpd'>
    <HR />
    <H1>Ce site utilise des cookies exclusivement à des fins statistiques. Vous pouvez les désactiver à tout moment si vous le souhaitez.
    <A HREF='?rgpd=1'>ACCEPTER</A> or <A HREF='?rgpd=0'>REFUSER</A></H1>
  </DIV>";
    }

  }

/* debug */
private function Details () {
  $details = null;
  if ( $this->IsCookie() ) {
    $details .= "<h2>Cookie detected</h2>";
    if ( $this->IsActive() ) {
      $details.="<h2>Cookie autorised</h2>";
      }
    else {
      $details.="<h2>Cookie not autorised</h2>";
      }
    }
  else {
    $details .= "<h2>Cookie not detected</h2>";
    }
  return $details;
  }

}

?>