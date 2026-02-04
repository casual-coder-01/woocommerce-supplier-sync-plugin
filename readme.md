# WooCommerce Supplier Sync Plugin

This WordPress plugin connects a WooCommerce store to an external Node.js API
to automatically sync product price and stock from suppliers.

## What this plugin does
- Triggers product syncs (manual and scheduled)
- Communicates securely with a Node.js backend using JWT
- Updates WooCommerce product price and stock
- Stores admin-friendly sync logs

## What this plugin does NOT do
- It does not talk directly to supplier APIs
- It does not handle supplier authentication
- It does not modify WooCommerce database tables directly

This plugin is designed to be clear, maintainable, and production-ready.

## Features Implemented
✔ Supplier API Base URL configuration
✔ WordPress settings API integration
✔ Secure AJAX connection testing
✔ Nonce verification for security
✔ Real-time admin UI feedback
✔ Modular plugin architecture
