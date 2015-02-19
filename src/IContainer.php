<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

use DotMailer\Api\Resources\IResources;

/**
 * Interface IContainer
 *
 */
interface IContainer extends \ArrayAccess, \Iterator
{

    const USERNAME = 'username';
    const PASSWORD = 'password';

    /**
     * Get the Resources object initialized for the $name account
     *
     * @param string $name
     * @return IResources
     * @throws Exception
     */
    public function getResources($name);

    /**
     * Get a Sub-container of the current container
     *
     * @param string $name
     * @return IContainer
     * @throws Exception
     */
    public function getContainer($name);

}
