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

	function __construct( $template ) {
		$this->template = $template;
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
	 * @return void
	 */
	public function render() {
		include_once "$this->templatePath/$this->template.php";
	}
}

