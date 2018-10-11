<?php
namespace Baze\LoginByAttributes\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Baze\LoginByAttributes\Model\ConfigProvider as AdvancedLoginConfigProvider;
use Baze\LoginByAttributes\Model\Config\Source\LoginMode;

/**
 * Class Login
 *
 * @package Baze\LoginByAttributes\Helper
 */
class Login extends AbstractHelper
{
    /**
     * @var AdvancedLoginConfigProvider
     */
    private $advancedLoginConfigProvider;

    /**
     * Login constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param AdvancedLoginConfigProvider           $advancedLoginConfigProvider
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        AdvancedLoginConfigProvider $advancedLoginConfigProvider
    ) {
        parent::__construct($context);
        $this->advancedLoginConfigProvider = $advancedLoginConfigProvider;
    }

    /**
     * Retrieve the email field config
     *
     * @return array
     */
    public function getEmailFieldConfig()
    {
        switch ($this->advancedLoginConfigProvider->getLoginMode()) {
            case LoginMode::LOGIN_TYPE_ONLY_ATTRIBUTE:
                $label = $this->advancedLoginConfigProvider->getLoginAttributeLabel();
                $type = 'text';
                $dataValidate = "{required:true}";
                break;
            case LoginMode::LOGIN_TYPE_BOTH:
                $label = 'Email / ' . $this->advancedLoginConfigProvider->getLoginAttributeLabel();
                $type = 'text';
                $dataValidate = "{required:true}";
                break;
            default:
                $label = 'Email';
                $type = 'email';
                $dataValidate = "{required:true, 'validate-email':true}";
                break;
        }

        return [
            'label'         => $label,
            'type'          => $type,
            'data_validate' => $dataValidate
        ];
    }
}
