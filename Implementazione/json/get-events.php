<?php

//--------------------------------------------------------------------------------------------------
// This script reads event data from a JSON file and outputs those events which are within the range
// supplied by the "start" and "end" GET parameters.
//
// An optional "timezone" GET parameter will force all ISO8601 date stings to a given timezone.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------
session_start();
if (isset($_SESSION['ut']) && isset($_SESSION['pw']) && (strlen($_SESSION['ut']) > 0) && (strlen($_SESSION['pw']) > 0)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($id != null && strlen($id) != 0 && strlen($id) == 4) {

            require '../database.php';

            include 'utils.php';
            if (!isset($_GET['start']) || !isset($_GET['end'])) {
                die("Please provide a date range.");
            }

            $range_start = parseDateTime($_GET['start']);
            $range_end = parseDateTime($_GET['end']);


            $timezone = null;
            if (isset($_GET['timezone'])) {
                $timezone = new DateTimeZone($_GET['timezone']);
            }

            $database = new Datab();

            $input_arrays = $database->queryJSON("time-platform", "SELECT * FROM turno WHERE MatricolaAut=" . $id . "");

            $output_arrays = array();
            foreach ($input_arrays as $array) {


                $event = new Event($array, $timezone);


                $output_arrays[] = $event->toArray();

            }

            echo json_encode($output_arrays);

        } else {
            exit;
        }
    } else {
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}