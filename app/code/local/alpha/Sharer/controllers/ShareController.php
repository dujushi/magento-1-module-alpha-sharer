<?php
class Alpha_Sharer_ShareController extends Mage_Core_Controller_Front_Action
{

    public function facebookAction()
    {
        if ($this->getRequest()->isXmlHttpRequest() && $this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            $share = Mage::getModel('sharer/message');
            $share->setProductId($data['product_id']);
            $share->setCustomerId(Mage::getSingleton('customer/session')->getCustomerId());
            $share->setAppType('Facebook');
            $share->setAppUserId($data['facebook_user_id']);
            $share->setContent($data['message']);
            $share->save();

            $appId = Mage::getStoreConfig('sharer/facebook_group/id_input',Mage::app()->getStore());
            $secret = Mage::getStoreConfig('sharer/facebook_group/secret_input',Mage::app()->getStore());

            if (!$appId || !$secret) {
                throw new Exception('Facebook Setting Error');
            } else {
//                if (class_exists('Facebook\Facebook')) {
//                    require_once MAGENTO_ROOT . '/lib/facebook/php-sdk-v4/src/Facebook/autoload.php';
//                }

                $fb = new Facebook\Facebook([
                    'app_id' => $appId,
                    'app_secret' => $secret,
                    'default_graph_version' => 'v2.2',
                ]);

                $linkData = [
                    'link' => $data['url'],
                    'message' => $data['message'],
                ];

                try {
                    $response = $fb->post('/me/feed', $linkData, $data['access_token']);
                } catch(Facebook\Exceptions\FacebookResponseException $e) {
                    Mage::logException($e);
                } catch(Facebook\Exceptions\FacebookSDKException $e) {
                    Mage::logException($e);
                }
            }

            exit;
        }
    }
}