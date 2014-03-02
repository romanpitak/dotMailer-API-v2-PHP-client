<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
namespace DotMailer\Api;

final class Campaigns extends Service {

	public function get($campaignId) {
		return $this->execute(sprintf("%s/%s", 'campaigns', $campaignId));
	}

}