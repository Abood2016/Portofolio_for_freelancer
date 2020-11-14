<?php
session_start();

require_once ('lib/portfolio.php');

$portfolio = new Portfolio();
$portfolio-> delete_portfoli($_GET['proid']);

if ($portfolio == 1) {
    header('LOCATION:allportfolio.php');
} else {
    header('LOCATION:allportfolio.php');

}
