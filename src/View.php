<?php 
namespace Core; 

/**
 * A View class manages template files to be loaded from controllers.
 */
class View
{
	/**
	 * The file name of the template to be loaded.
     *
	 * @var string | null
	 */
	private $template = null;

	/**
	 * Data variables to be used in the view template.
     *
	 * @var array
	 */
	private $data = [];

	/**
	 * Path from where templates are loaded.
     *
	 * @var string | null
	 */
	private $templatePath = null;

	function __construct() {
		$this->templatePath = "templates";
	}

	/**
	 * Get the name of the current view template.
     *
	 * @return string Name of the template.
	 */
	public function getTemplateString() : string {
		return $this->template;
	}

	/**
	 * Template path getter.
     *
	 * @return string
	 */
	public function getTemplatePath() : string {
		return $this->templatePath;
	}
	
	/**
	 * Render a view template.
     *
	 * @param string The name of the template file minus the ".php" extension.
	 * @param array  The data that should be made available inside the template.
     *
	 * @return void
	 */
	public function render(string $template, $data = []) {
        extract($data);
		include_once "$this->templatePath/base-header.php";
		include_once "$this->templatePath/$template.php";
		include_once "$this->templatePath/base-footer.php";
	}

	/**
	 * Render a form template.
     *
	 * @param string The name of the template file minus the ".php" extension.
	 * @param array  The data that should be made available inside the template.
     *
	 * @return void
	 */
	public function renderForm(string $formTemplate, $data = []) {
        extract($data);
		include_once "$this->templatePath/form/{$formTemplate}.php";
	}
	
	/**
	 * Render a error view template.
     *
	 * @param string The name of the template file minus the ".php" extension.
	 * @param array  The data that should be made available inside the template.
     *
	 * @return void
	 */
	public function renderError(string $template, $data = []) {
        extract($data);
		include_once "$this->templatePath/error/error-header.php";
		include_once "$this->templatePath/error/$template.php";
		include_once "$this->templatePath/error/error-footer.php";
	}

	/**
	 * Check if a template files exists.
     *
	 * @param string The name of the template file.
     *
	 * @return void.
	 */
    private function templateExists(string $filename) : bool
    {
		return file_exists("$this->templatePath/{$filename}.php");
    }

}

