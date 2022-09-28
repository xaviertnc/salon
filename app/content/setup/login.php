<?php

/**
 * ./app/content/home/login.php
 * 
 * Home page controller - 23 Sep 2022
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * @version 1.0.0 - 24 Sep 2022
 * 
 */

$view->theme = 'salon';
$view->title = 'User Authentication';



// -------------
// --- POST  ---
// -------------

if ( $http->req->isPost ) {

  $error = null;
  $goto = $http->req->referer;
  
  do {

    if ( $http->get( 'submit' ) == 'Login' )
    {

      $username = $http->get( 'username' );
      $password = $http->get( 'password' );

      $db->connect( $app->dbConnection[ 'salon' ] );

      try {

        if ( $auth->login( $username, $password ) ) $goto = 'bookings';
        else $error = 'User or password invalid.';

      }

      catch (Exception $e) {

        $error = $e->getMessage();

      }

      break;

    }

    $error = 'You said what? I no understand :/';

  } while(0);


  if ( $error ) $session->flash( 'error', $error );

  header( 'Location:' . $goto );

}



// -----------
// --- GET ---
// -----------

$view->useStyleFile( 'form.css' );

$view->useScriptFile( 'form.js' );
$view->useScriptFile( 'form-validators.js' );
// $view->useScriptFile( 'form-fieldtypes.js' );

include $view->getFile();