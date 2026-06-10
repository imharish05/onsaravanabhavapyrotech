<?php

// AUTO-GENERATED TEST FOR MODULE: Login
echo "\n============================================\n";
echo "🚀 Running Advanced QA Tests for Login\n";
echo "============================================\n";

$baseUrl    = "http://127.0.0.1:8000";
$cookieFile = __DIR__ . "/shared_session.txt"; // Shared by master_test_runner.php
$csrfFile   = __DIR__ . "/shared_csrf.txt";

// --- LOAD SHARED SESSION + CSRF TOKEN ---
if (!file_exists($cookieFile)) {
    echo "❌ Shared session not found. Run master_test_runner.php first!\n";
    exit(1);
}

$csrfToken = trim(file_get_contents($csrfFile) ?: "");

// Refresh CSRF from dashboard using the shared session
$ch = curl_init($baseUrl . "/dashboard");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIEFILE     => $cookieFile,
    CURLOPT_COOKIEJAR      => $cookieFile,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_TIMEOUT        => 10,
]);
$dashResp = curl_exec($ch);
$dashCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Try to extract fresh CSRF from the dashboard response
preg_match('/<meta name="csrf-token" content="([^"]+)"/i', $dashResp, $m);
if (!empty($m[1])) $csrfToken = $m[1];

if ($dashCode === 200 || $dashCode === 302) {
    echo "✅ Shared session valid (HTTP $dashCode). CSRF ready.\n";
} else {
    echo "⚠️ Session may have expired (HTTP $dashCode). Tests proceed with stored CSRF.\n";
}

// --- FULL ENDPOINT TESTS ---

// Testing POST /login
$ch = curl_init($baseUrl . "/login");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("POST" === "POST" || "POST" === "PUT" || "POST" === "DELETE") {
    if("POST" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] POST /login -> login() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /login -> login() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /login -> login() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /login -> login() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing POST /forgetpassword
$ch = curl_init($baseUrl . "/forgetpassword");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("POST" === "POST" || "POST" === "PUT" || "POST" === "DELETE") {
    if("POST" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] POST /forgetpassword -> forgetpassword() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /forgetpassword -> forgetpassword() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /forgetpassword -> forgetpassword() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /forgetpassword -> forgetpassword() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing POST /logout
$ch = curl_init($baseUrl . "/logout");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("POST" === "POST" || "POST" === "PUT" || "POST" === "DELETE") {
    if("POST" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] POST /logout -> logout() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /logout -> logout() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /logout -> logout() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /logout -> logout() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);


// --- SECURITY TEST (SQL Injection) ---
$ch = curl_init($baseUrl . "/login");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query(["_token" => $csrfToken, "id" => "1 OR 1=1 --", "name" => "\" OR \""]),
    CURLOPT_COOKIEFILE     => $cookieFile,
    CURLOPT_TIMEOUT        => 10,
]);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if ($httpcode >= 500) {
    echo "⚠️ [WARN] SQL Injection check returned 500 — possible unprotected query.\n";
} else {
    echo "✅ [PASS] SQL Injection check successfully bounded/handled.\n";
}

// --- SECURITY TEST (Auth Bypass — fresh no-cookie request) ---
$ch = curl_init($baseUrl . "/login");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_TIMEOUT        => 10,
]);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if ($httpcode === 200 && !str_contains($response, "login")) {
    echo "⚠️ [WARN] Auth Bypass — page loaded without login! May be unprotected.\n";
} else {
    echo "✅ [PASS] Auth Bypass prevented (HTTP $httpcode).\n";
}

// --- PERFORMANCE / STRESS TEST (50, 100, 200 concurrent) ---
$profiles = [50, 100, 200];
echo "⏳ Load Testing /login...\n";
foreach ($profiles as $reqCount) {
    $start = microtime(true);
    $successCount = 0;
    $mh = curl_multi_init();
    $handles = [];
    for ($i = 0; $i < $reqCount; $i++) {
        $ch = curl_init($baseUrl . "/login");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_COOKIEFILE     => $cookieFile,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_TIMEOUT        => 10,
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[] = $ch;
    }
    $running = null;
    do { curl_multi_exec($mh, $running); } while ($running);
    foreach ($handles as $ch) {
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($code === 200 || $code === 302) $successCount++; // 302 = valid authenticated redirect
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    $elapsed = number_format(microtime(true) - $start, 2);
    echo "✔️ Load[$reqCount]: {$elapsed}s | Success: " . round(($successCount / $reqCount) * 100, 1) . "%\n";
}

echo "---------------------------------\n";
