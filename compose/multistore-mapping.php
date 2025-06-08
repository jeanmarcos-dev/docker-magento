<?php
/**
 * Multistore mapping for Magento (development).
 * Easy-to-read, easy-to-extend version using match().
 */

if (!isset($_SERVER['HTTP_HOST'])) {
    return;
}

function setStore(string $code): void
{
    $_SERVER['MAGE_RUN_TYPE'] = 'store';
    $_SERVER['MAGE_RUN_CODE'] = $code;
}

function setWebsite(string $code): void
{
    $_SERVER['MAGE_RUN_TYPE'] = 'website';
    $_SERVER['MAGE_RUN_CODE'] = $code;
}

// match ($_SERVER['HTTP_HOST']) {
//     // Store mappings
//     'store1.local'       => setStore('store1'),
//     'store2.local'       => setStore('store2'),
//     'store3.local'       => setStore('store3'),
//     // Website mappings
//     'admin.store.local'  => setWebsite('admin_website'),
//     // Default fallback
//     default              => setStore('default'),
// };


