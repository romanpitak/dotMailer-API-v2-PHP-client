<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\DataTypes;

/**
 * Class ApiSplitTestSendOptions
 *
 * @property ApiSplitTestMetrics testMetric
 * @property XsInt testPercentage
 * @property XsInt testPeriodHours
 */
final class ApiSplitTestSendOptions extends JsonObject
{

    protected function getProperties()
    {
        return array(
            'TestMetric' => 'ApiSplitTestMetrics',
            'TestPercentage' => 'XsInt',
            'TestPeriodHours' => 'XsInt',
        );
    }

}
