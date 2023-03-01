<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StatusLiked implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	// public $username;

	public $message;
	
	public $uid;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	// public function __construct($username)
	// {
	// 	$this->username = $username;
	// 	$this->message  = "{$username} liked your status";
	// }
	public function __construct($message,$uid)
	{	
// 		$this->message  = 'Received Leave Application From Employees Please Check';
		$this->message  = $message;
		$this->uid  = $uid;
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return Channel|array
	 */
	public function broadcastOn()
	{
		return ['my-channel.'.$this->uid];
	}
  
	public function broadcastAs()
	{
		return 'my-event';
	}
}