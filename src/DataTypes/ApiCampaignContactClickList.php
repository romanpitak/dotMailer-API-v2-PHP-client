<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api\DataTypes;


class ApiCampaignContactClickList extends JsonArray {

	protected function getDataClass() {
		return 'ApiCampaignContactClick';
	}

} 