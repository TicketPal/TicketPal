<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tickets;
use App\Models\TicketContent;

class TicketController extends Controller
{
	public function Tickets(Request $request, $id = 0){
		$data['template'] = 'tickets';
		//select DISTINCT `ticket_contents`.`node`,`ticket_contents`.`email`, tickets.title, tickets.status from `tickets` join `ticket_contents` on `tickets`.`id` = `ticket_contents`.`node` ORDER BY `ticket_contents`.`node`;
        $tickets = DB::table('tickets')
		->select('node','email', 'title', 'status')
		->Join('ticket_contents', 'tickets.id', '=', 'ticket_contents.node')
		->distinct('node')
		->offset($id*10)->limit(10)
		->get();
		$tk = new \stdClass(); 
		$tk->next = ($id + 1);
		$tk->previous = (($id -1) < 0)? 0 : ($id - 1);
        return view('main',compact('data','tickets','tk'));
	}
	
	public function delete(Request $request){
		DB::table('tickets')->whereIn('id',$request->tickets)->delete();
		return DB::table('ticket_contents')->whereIn('node',$request->tickets)->delete();
	}
	
	public function Create(Request $request){
		$data['template'] = 'cticket';
        return view('main',compact('data'));
	}
	
	public function CreateTicket(Request $request){
		
		$request->validate([
            'title'     =>   'required',
            'body'        =>   'required',
        ]);
		
        $data = $request->all();
		
		$data['email'] = Auth()->user()->email;
		
		$data['node'] = Tickets::create($data)->id;
		
        TicketContent::create($data);
		
		return $data['node'];
	}
	
	public function OpenTicket($id = 0){
		$data['template'] = 'oticket';
		$tickets = DB::table('tickets')->where('id',$id)->get();
		$tickets = $tickets[0];
		//->orderBy('id', 'desc')
		$contents = DB::table('ticket_contents')->where('node',$id)->get();
        return view('main',compact('data','tickets','contents'));
	}
	
	public function _OpenTicketStatus($status){
		return $this->OpenTicketStatus($status, 0);
	}
	
	public function OpenTicketStatus($status, $id){
		$id = (int)$id;
		$data['template'] = 'stickets';
        $tickets = DB::table('tickets')
		->select('node','email', 'title', 'status')
		->Join('ticket_contents', 'tickets.id', '=', 'ticket_contents.node')
		->distinct('node')
		->offset($id*10)
		->limit(10)
		->where('status',$status)
		->get();
		$tk = new \stdClass(); 
		$tk->next = ($id + 1);
		$tk->previous = (($id -1) < 0)? 0 : ($id - 1);
        return view('main',compact('data','tickets','tk','status'));
	}
	
	public function WriteTicket(Request $request){
		$data = $request->all();
		$data['node'] = $request->route('id');
		$data['email'] = Auth()->user()->email;
		TicketContent::create($data);
	}
	
	public function TicketStatus(Request $request){
		$data = $request->all();
		$data['node'] = $request->route('id');
		DB::table('tickets')
		->where('id', $data['node'])
		->update(array('status' => $data['status']));
	}
}
