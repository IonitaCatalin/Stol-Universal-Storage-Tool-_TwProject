<?php
	class VRegister {
		private $template;

		public function __construct() {
			$this->template = 'sregister.php';
		}

		public function renderView() {
			ob_start();
			include($this->template);
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
?>