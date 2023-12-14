<?php
/**
 * PHPMailer Exception base class.
 * PHP Version 5.5.
 *
 * @category   PHPMailer
 * @package    PHPMailer
 * @author     Marcus Bointon
 * @copyright  2013-2016 Marcus Bointon
 * @license    http://opensource.org/licenses/gpl-license GNU Public License
 * @link       https://github.com/PHPMailer/PHPMailer/
 */
namespace PHPMailer\PHPMailer;

/**
 * PHPMailer exception handler.
 * @package PHPMailer
 */
class Exception extends \Exception
{
    /**
     * Prettify error message output.
     * @return string
     */
    public function errorMessage()
    {
        return '<strong>' . $this->getMessage() . "</strong><br />\n";
    }
}
