<?php 
require 'assets/rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=neurocomputers','root', '' );
if ( !R::testconnection() )
	exit ('Нет соединения с базой данных');
session_start();
