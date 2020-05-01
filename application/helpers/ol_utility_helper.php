<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('assets_url()')) {
	function assets_url() {
		return base_url() . 'assets';
	}
}

if (!function_exists('npm_url()')) {
	function npm_url() {
		return base_url() . 'node_modules';
	}
}
