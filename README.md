# Login By Attributes

Allows stores to configure the login process to alias particular attributes as the login ID. Adds a custom field for customers, explicitly for this use.

## Architecture

Standalone module.

## Properties

Module name: Baze_LoginByAttributes

Configured through Customers -> Advanced Login.

"Login Mode": selects which options are available for a customer to log in with.

"Login Attribute": text input. The internal name for a variablethat can be used in place of "email" for logging in.

"Login Attribute Label": text input. Custom label for the customers' login page.

## Credit

Codebase is forked from semaio/Magento2-AdvancedLogin. Credit for original development is due to Rouven Alexander Rieker.