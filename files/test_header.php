<?php
// Test the header file without including config
echo "Testing header file...\n";

// Simulate the problematic code
$CategoryRec = null;
if ($CategoryRec && is_object($CategoryRec) && method_exists($CategoryRec, 'fetch')) {
    while ($CategoryDetails = $CategoryRec->fetch(PDO::FETCH_ASSOC)) {
        echo "This should not execute\n";
    }
}
echo "Test completed successfully!\n";
?> 