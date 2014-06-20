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
		$salesteams = $this->salesrepo->getSalesTeam();
		$teamleaders = $this->salesrepo->getTeamLeader();
		$commissions = $this->salesrepo->getCommissions();
		// return View::make('admin.admin_invite')->withTitle('Invite')->withCommissions($commissions)
		// ->with('salesteams',$salesteams)->with('teamleaders',$teamleaders);
		return View::make('admin.admin_invite_new')->withTitle('Invite')->withCommissions($commissions)
		->with('salesteams',$salesteams)->with('teamleaders',$teamleaders);
	}
}