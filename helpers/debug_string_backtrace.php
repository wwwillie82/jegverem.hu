<?php
function debug_string_backtrace() {
   global $config;

   // Keep backtrace logging opt-in to avoid noisy logs in normal runtime.
   if (!isset($config) || !is_array($config) || empty($config["enable_helper_backtrace_debug"])) {
      return null;
   }

	ob_start();
   debug_print_backtrace();
   $trace = ob_get_contents();
   ob_end_clean();

   // Remove first item from backtrace as it's this function which
   // is redundant.
   $trace = preg_replace ('/^#0\s+' . __FUNCTION__ . "[^\n]*\n/", '', $trace, 1);

   // Renumber backtrace items.
   $trace = preg_replace_callback('/^#(\d+)/m', function($matches) {
      return '#' . ((int)$matches[1] - 1);
   }, $trace);

   return $trace;
}
?>
