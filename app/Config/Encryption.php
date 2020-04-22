<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Encryption configuration.
 *
 * These are the settings used for encryption, if you don't pass a parameter
 * array to the encrypter for creation/initialization.
 */
class Encryption extends BaseConfig
{
	/*
	  |--------------------------------------------------------------------------
	  | Encryption Key Starter
	  |--------------------------------------------------------------------------
	  |
	  | If you use the Encryption class you must set an encryption key (seed).
	  | You need to ensure it is long enough for the cipher and mode you plan to use.
	  | See the user guide for more info.
	 */

	public $key = 'cf41d3a42d3d5000d32454dac376ba834ab1e4dd75e509e3c000f2b0d3c612dd';

	/*
	  |--------------------------------------------------------------------------
	  | Encryption driver to use
	  |--------------------------------------------------------------------------
	  |
	  | One of the supported drivers, eg 'OpenSSL' or 'Sodium'.
	  | The default driver, if you don't specify one, is 'OpenSSL'.
	 */
	public $driver = 'OpenSSL';

}
