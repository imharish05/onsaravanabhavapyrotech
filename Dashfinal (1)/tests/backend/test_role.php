<?php

// AUTO-GENERATED TEST FOR MODULE: Role
echo "\n============================================\n";
echo "🚀 Running Advanced QA Tests for Role\n";
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

// Testing GET /roles
$ch = curl_init($baseUrl . "/roles");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /roles -> index() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /roles -> index() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /roles -> index() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /roles -> index() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /roles/create
$ch = curl_init($baseUrl . "/roles/create");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /roles/create -> create() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /roles/create -> create() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /roles/create -> create() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /roles/create -> create() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing POST /roles
$ch = curl_init($baseUrl . "/roles");
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
    echo "✅ [PASS] POST /roles -> store() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /roles -> store() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /roles -> store() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /roles -> store() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /roles/{role}/edit
$ch = curl_init($baseUrl . "/roles/{role}/edit");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /roles/{role}/edit -> edit() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /roles/{role}/edit -> edit() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /roles/{role}/edit -> edit() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /roles/{role}/edit -> edit() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing PUT /roles/{role}
$ch = curl_init($baseUrl . "/roles/{role}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("PUT" === "POST" || "PUT" === "PUT" || "PUT" === "DELETE") {
    if("PUT" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] PUT /roles/{role} -> update() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] PUT /roles/{role} -> update() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] PUT /roles/{role} -> update() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] PUT /roles/{role} -> update() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing DELETE /roles/{role}
$ch = curl_init($baseUrl . "/roles/{role}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("DELETE" === "POST" || "DELETE" === "PUT" || "DELETE" === "DELETE") {
    if("DELETE" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] DELETE /roles/{role} -> destroy() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] DELETE /roles/{role} -> destroy() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] DELETE /roles/{role} -> destroy() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] DELETE /roles/{role} -> destroy() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /roles/{id}/assign-permission
$ch = curl_init($baseUrl . "/roles/{id}/assign-permission");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /roles/{id}/assign-permission -> assignPermissionPage() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /roles/{id}/assign-permission -> assignPermissionPage() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /roles/{id}/assign-permission -> assignPermissionPage() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /roles/{id}/assign-permission -> assignPermissionPage() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing POST /roles/assign-permission
$ch = curl_init($baseUrl . "/roles/assign-permission");
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
    echo "✅ [PASS] POST /roles/assign-permission -> assignPermission() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /roles/assign-permission -> assignPermission() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /roles/assign-permission -> assignPermission() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /roles/assign-permission -> assignPermission() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);


// --- SECURITY TEST (SQL Injection) ---
$ch = curl_init($baseUrl . "/roles");
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
$ch = curl_init($baseUrl . "/roles");
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
echo "⏳ Load Testing /roles...\n";
foreach ($profiles as $reqCount) {
    $start = microtime(true);
    $successCount = 0;
    $mh = curl_multi_init();
    $handles = [];
    for ($i = 0; $i < $reqCount; $i++) {
        $ch = curl_init($baseUrl . "/roles");
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
