<?php
namespace App\Contracts\Tickets;

interface TicketRepositoryInterface
{

	public function get_status();

    public function get_all_market_segments();

    public function get_all_receiver_banks();

    public function get_all_transaction_types();

    public function get_all_customer_type();
    

    public function get_group();
	
	public function index();

    

}