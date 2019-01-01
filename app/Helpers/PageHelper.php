<?php

/* Discord stuff */

function sendWebhook($provider, $message) {
  $data = array("content" => $message, "username" => ucfirst($provider));
  $curl = curl_init(config("services.discord.{$provider}_webhook"));
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  return curl_exec($curl);
}

function sendMessage($message) {
  return sendWebhook("message", $message);
}

function sendCommission($message) {
  return sendWebhook("commission", $message);
}

/* Commission stuff */
function getCType(int $code) {
  $types = [
    "Chibi 1",
    "Chibi 2",
    "Panel",
    "Other",
  ];

  return $types[$code];
}

function getStatus(int $code) {
  $statuses = [
    "Awaiting Approval",
    "Approved",
    "Currently Drawing",
    "Sketch finished, please pay invoice",
    "Payment Received, now coloring",
    "Completed"
  ];

  return $statuses[$code];
}

function censor($input) {
	$count = strlen($input) / 2;
	$output = substr_replace($input, str_repeat('*', $count), strlen($input) / 6, $count);

	return $output;
}

/* Misc */
function isActive(string $path, string $class_name = "active") {
  return Request::path() === $path ? $class_name : "";
}

function lastModified(string $filename) {
  return date("F d, Y H:i:s", filemtime($filename));
}

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0)
        return true;

    return (substr($haystack, -$length) === $needle);
}

function getFolderContents($directory) {
  $ignoreArr = [".", ".."];
  return array_values(array_diff(scandir($directory), $ignoreArr));
}

// https://stackoverflow.com/a/52742492
function setEnv($key, $value)
{
    $path = app()->environmentFilePath();
    $oldKey = env($key) ? 'true' : 'false';
    $escaped = preg_quote('='.$oldKey, '/');

    file_put_contents($path, preg_replace(
        "/^{$key}{$escaped}/m",
        "{$key}={$value}",
        file_get_contents($path)
    ));
}
