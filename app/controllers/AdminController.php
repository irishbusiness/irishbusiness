<?php
use IrishBusiness\Repositories\SalesRepository;
class AdminController extends \BaseController {

	protected $salesrepo;

	public function __construct(SalesRepository $salesperson)
	{
		$this->salesrepo = $salesperson;
	}

	public function index()
	{
		//
	}

	public function invite()
	{
		$commissions = $this->salesrepo->getCommissions();
		return View::make('admin.admin_invite')->withTitle('Invite')->withCommissions($commissions);
	}
}