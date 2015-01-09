<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 16/12/14
 * Time: 20:25
 */
namespace AppBundle\Twig\Extension;


use PHPQRCode\QRcode;

class AppExtension extends \Twig_Extension {
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('qrcode', [$this, 'qrcode']),
        ];
    }

    public function qrcode($data = null)
    {
        $path = dirname(__FILE__) . '/../../../../web/img/';

        $filename = uniqid().'.png';

        $file =$path . $filename;

        QRcode::png('hello',$file, 'M', 4, 4);

        return 'img/'.$filename;

    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'app_extension';
    }
}