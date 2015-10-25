<?php
/**
 * @package romanpitak/dotmailer-api-v2-client
 * @author Roman Piták <roman@pitak.net>
 * @copyright MIT
 */

/**
 * Generate a test class and write it to the appropriate file.
 *
 * @param $className string
 */
function generateEnumTestSubclass($className)
{
    $template = <<<END_OF_TEMPLATE
<?php
/**
 * @package romanpitak/dotmailer-api-v2-client
 * @author Roman Piták <roman@pitak.net>
 * @copyright MIT
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class ${className}Test
 *
 * @covers \DotMailer\Api\DataTypes\Enum
 * @covers \DotMailer\Api\DataTypes\\${className}
 */
class ${className}Test extends EnumTest
{
}

END_OF_TEMPLATE;

    file_put_contents(__DIR__ . '/../DataTypes/' . $className . 'Test.php', $template);
}

generateEnumTestSubclass('ApiAddressBookVisibility');
generateEnumTestSubclass('ApiAssignedContactDataExistsAction');
generateEnumTestSubclass('ApiBusinessObjectType');
generateEnumTestSubclass('ApiCampaignReplyActions');
generateEnumTestSubclass('ApiCampaignReplyTypes');
generateEnumTestSubclass('ApiCampaignSendStatuses');
generateEnumTestSubclass('ApiCampaignStatuses');
generateEnumTestSubclass('ApiContactEmailTypes');
generateEnumTestSubclass('ApiContactImportStatuses');
generateEnumTestSubclass('ApiContactOptInTypes');
generateEnumTestSubclass('ApiContactStatuses');
generateEnumTestSubclass('ApiDataFieldVisibility');
generateEnumTestSubclass('ApiDataTypes');
generateEnumTestSubclass('ApiProgramEnrolmentStatus');
generateEnumTestSubclass('ApiProgramStatus');
generateEnumTestSubclass('ApiRespondentNotificationType');
generateEnumTestSubclass('ApiResubscribeStatuses');
generateEnumTestSubclass('ApiRoiDetailDataTypes');
generateEnumTestSubclass('ApiSegmentRefreshStatuses');
generateEnumTestSubclass('ApiSplitTestMetrics');
generateEnumTestSubclass('ApiSurveyAssignedAddressBookTarget');
generateEnumTestSubclass('ApiSurveyConfirmationMode');
generateEnumTestSubclass('ApiSurveySubmissionMode');
generateEnumTestSubclass('ApiSurveyState');
generateEnumTestSubclass('ApiTransactionalDataImportFaultReason');
generateEnumTestSubclass('ApiTransactionalDataImportStatuses');
