<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;


final class ApiBusinessObjectType extends Enum
{

    const CAMPAIGN = 'Campaign';
    const SURVEY = 'Survey';
    const MICROSITE_PAGE = 'MicrositePage';
    const DYNAMIC_CONTENT = 'DynamicContent';
    const CONTACT_LABEL = 'ContactLabel';
    const SURVEY_QUESTION = 'SurveyQuestion';
    const ADDRESS_BOOK = 'AddressBook';
    const DYNAMIC_CONTENT_RULE = 'DynamicContentRule';
    const CAMPAIGN_LINK = 'CampaignLink';
    const CAMPAIGN_TEMPLATE = 'CampaignTemplate';
    const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';


    /*
     * ========== Enum ==========
     */

    protected function getDataClass()
    {
        return 'XsString';
    }

    protected function getPossibleValues()
    {
        return array(
            self::CAMPAIGN,
            self::SURVEY,
            self::MICROSITE_PAGE,
            self::DYNAMIC_CONTENT,
            self::CONTACT_LABEL,
            self::SURVEY_QUESTION,
            self::ADDRESS_BOOK,
            self::DYNAMIC_CONTENT_RULE,
            self::CAMPAIGN_LINK,
            self::CAMPAIGN_TEMPLATE,
            self::NOT_AVAILABLE_IN_THIS_VERSION
        );
    }

}
