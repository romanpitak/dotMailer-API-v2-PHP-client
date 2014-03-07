<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api\DataTypes;


class ApiCampaignList extends JsonArray {

	protected function getDataClass() {
		return 'ApiCampaign';
	}

} 