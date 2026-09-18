<?php

if (session_status() === PHP_SESSION_NONE) { // Checks to see if a session isn't already active (avoids the "already started" notice)
    session_start(); // starts the session if one has not started yet
}

$_SESSION = [];               // Clear all session variables (removes any stored login data, etc.)
session_destroy();            // Destroy the session data on the server

// Also clear the session cookie in the browser, since session_destroy() alone
// doesn't remove the cookie — the browser would otherwise keep sending the old
// session ID on future requests
if (ini_get("session.use_cookies")) {   //this line reads a setting from the PHP menu 
                                        //this will check whether the session ID is add into the cookie in the user browser
                                        //and "session.use_cookies has to be on if not then there is no use for setcookie()

    $params = session_get_cookie_params();  // Get the current cookie's settings (path, domain, etc.)
    setcookie(
        session_name(),        // The name of the session cookie (usually "PHPSESSID")
        '',                     // Empty value — nothing left to store
        time() - 42000,         // A timestamp in the past, which tells the browser to delete it now
        $params["path"],        // Keep the same path the cookie was originally set on
        $params["domain"],      // Keep the same domain the cookie was originally set on
        $params["secure"],      // Keep the same "HTTPS only" setting
        $params["httponly"]     // Keep the same "not accessible via JavaScript" setting
    );
}

header("Location: ../HTML/index.php"); // Redirect the user back to the homepage/login page
exit;                                   // Stop script execution immediately after redirecting

?>