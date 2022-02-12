<?php /** @noinspection PhpUndefinedVariableInspection */
/** @noinspection AutoloadingIssuesInspection */
/** @noinspection MissUsingParentKeywordInspection */
/** @noinspection PhpMissingParentConstructorInspection */
/** @noinspection PhpUnused */
/** @noinspection MagicMethodsValidityInspection */

/**
 * @property $load
 * @property $template
 */
class Welcome extends Controller
{

    /**
     * Welcome constructor.
     */
    public function __construct()
    {
        parent::Controller();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('model_video');
        $this->template->write_view('navigation', 'elements/navigation');
    }

    /**
     *
     */
    public function index()
    {
        // select videos
        $this->template->write_view('content', 'elements/welcome', $data);
        $this->template->render();
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

